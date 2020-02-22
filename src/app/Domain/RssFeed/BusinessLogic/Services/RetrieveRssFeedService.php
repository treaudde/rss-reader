<?php

namespace App\Domain\RssFeed\BusinessLogic\Services;

use GuzzleHttp\Client;

/**
 * Class RetrieveRssFeedService
 * @package App\Domain\RssFeed\Services
 */
class RetrieveRssFeedService
{
    /**
     * @var Client
     */
    private $client;

    /**
     * RetrieveRssFeedService constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieve RSS data
     *
     * @param $url
     * @return string
     */
    public function getRssFeedData($url)
    {
        $response = $this->client->get($url);

        if ($response->getStatusCode() == 200) {
            $rssRawData = $response->getBody()->getContents();
            return $this->processRssData($rssRawData);
        }

        return "";
    }

    /**
     * @param $data
     * @return string
     */
    private function processRssData($data)
    {
        //process the xml
        $rssObject = simplexml_load_string($data);

        $items = [];

        foreach ($rssObject->channel->item as $item) {
            $items[] = [
                'link' => (string) $item->link,
                'title' => (string) $item->title,
                'pubDate' => (string) $item->pubDate,
                'description' => (string) $item->description
            ];
        }

        return json_encode($items);
    }
}
