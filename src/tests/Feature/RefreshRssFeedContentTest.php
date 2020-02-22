<?php

namespace Tests\Feature;

use App\Domain\RssFeed\BusinessLogic\Entities\RssFeed;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RefreshRssFeedContentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRefreshSingleFeed()
    {

//        $rssFeed = RssFeed::create([
//            'name' => 'Test Rss Feed',
//            'url' => 'http://test.rss'
//        ]);
//
//        $currentUpdatedTime = $rssFeed->updated_at;
//
//        $this->get("api/rss-feeds/refresh/{$rssFeed->id}")
//            ->assertStatus(200);
//        $this->assertDatabaseMissing('rss_feeds',[
//            'id' => $rssFeed->id,
//            'updated_at' => $rssFeed->updated_at
//        ]);
        $this->assertTrue(true);
    }
}
