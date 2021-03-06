<?php

namespace Tests\Feature;

use App\Domain\RssFeed\BusinessLogic\Services\RetrieveRssFeedService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Handler\MockHandler;
use App\Domain\RssFeed\BusinessLogic\Entities\RssFeed;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;

class ViewRssFeedContentTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();
        $this->rssFeedContent = file_get_contents(__DIR__.'/../Unit/files/rssResponse.txt');

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

    public function testLoadRssFeed()
    {
        $rss = RssFeed::create([
            'name' => 'Test Rss Feed',
            'url' => 'http://test.rss'
        ]);

        //@TODO find better way to test this json
        $this->get("api/rss-feeds/{$rss->id}", ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonFragment([
                'name' => 'Test Rss Feed',
                'url' => 'http://test.rss',
            ])->assertJsonStructure([
               'articles', 'feed'
            ]);
    }

    //@TODO test refresh method

    public function testLoadRssFeedNotFound()
    {
        $this->get("api/rss-feeds/not-found", ['Accept' => 'application/json'])
            ->assertStatus(404);
    }
}
