<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Domain\RssFeed\Entities\RssFeed;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewRssFeedListTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

    }

    public function testViewRssFeedList()
    {
        //create a list of 10 feeds
        for ($x=1; $x<=10; $x++) {
            RssFeed::create(
                [
                    'name' => "Rss Feed {$x}",
                    'url' => "http://rss.feed/{$x}"
                ]
            );
        }

        $response = $this->get('api/rss-feeds', ['Accept' => 'application/json']);
        $response->assertStatus(200)
            ->assertJsonStructure([
                ['id', 'name', 'url']
            ]);
    }
}
