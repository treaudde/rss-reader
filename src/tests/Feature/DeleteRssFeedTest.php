<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Domain\RssFeed\BusinessLogic\Entities\RssFeed;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteRssFeedTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function testDeleteFeed()
    {
        $feedData = [
            'name' => 'Test Feed',
            'url' => 'http://rss.feed'
        ];

        $rssFeed = RssFeed::create($feedData);

        $this->assertDatabaseHas('rss_feeds', $feedData);

        $this->delete("api/rss-feeds/{$rssFeed->id}", ['Accept' => 'application/json'])
            ->assertStatus(200);

        $this->assertDatabaseMissing('rss_feeds', $feedData);
    }

    public function testDeleteFeedNotFound()
    {
        $this->delete("api/rss-feeds/not-found", ['Accept' => 'application/json'])
            ->assertStatus(404);
    }
}
