<?php

namespace Tests\Unit;

use Tests\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Exception\RequestException;
use App\Domain\RssFeed\Services\RssFeedService;

class RssFeedServiceTest extends TestCase
{
    protected $rssFeedContent;

    protected $rssFeedService;

    public function setUp(): void
    {
        parent::setUp();
        $this->rssFeedContent = file_get_contents(__DIR__.'/files/rssResponse.txt');
    }

    public function testGetRssFeedData()
    {
        $this->setUpHttpMockSuccess();
        $this->rssFeedService = resolve(RssFeedService::class);

        $rssResult = $this->rssFeedService->getRssFeedData('http://test.rss');
        $this->assertJson(file_get_contents(
            __DIR__.'/files/rssJsonResult.txt'),
            $rssResult
        );
    }

    public function testGetRssFeedDataError()
    {
        $this->expectException(RequestException::class);
        $this->setUpHttpMockFailure();
        $this->rssFeedService = resolve(RssFeedService::class);

        $rssResult = $this->rssFeedService->getRssFeedData('http://test.rss');
        $this->assertEquals('', $rssResult);
    }

    private function setUpHttpMockSuccess()
    {
        $mock = new MockHandler([
            new Response(
                200,
                ['Content-type' => 'application/rss+xml;charset=utf-8'],
                $this->rssFeedContent
            )
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);
        $this->app->instance(Client::class, $client);
    }

    private function setUpHttpMockFailure()
    {
        $mock = new MockHandler([
            new RequestException('', new Request('get', 'http://test.rss'))
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);
        $this->app->instance(Client::class, $client);
    }
}
