<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Domain\RssFeed\Entities\RssFeed;
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

        $this->get("api/rss-feeds/{$rss->id}")
            ->assertStatus(200)
            ->assertJsonFragment([
                'id' => 1,
                'name' => 'Test Rss Feed',
                'url' => 'http://test.rss'
            ]);
    }
}
