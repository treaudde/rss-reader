<?php

namespace Tests\Feature;

use Tests\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Handler\MockHandler;
use App\Domain\RssFeed\Entities\RssFeed;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewRssFeedContentTest extends TestCase
{
    use RefreshDatabase;

    public function testLoadRssFeed()
    {
        $rss = RssFeed::create([
            'name' => 'Test Rss Feed',
            'url' => 'http://test.rss'
        ]);

        $this->get("api/rss-feeds/{$rss->id}", ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonFragment([
                'id' => 1,
                'name' => 'Test Rss Feed',
                'url' => 'http://test.rss'

            ]);
    }

    public function testLoadRssFeedNotFound()
    {
        $this->get("api/rss-feeds/not-found", ['Accept' => 'application/json'])
            ->assertStatus(404);
    }
}
