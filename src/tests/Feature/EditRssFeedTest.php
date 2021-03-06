<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Domain\RssFeed\BusinessLogic\Entities\RssFeed;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditRssFeedTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function testEditFeed()
    {
        $feedData = [
          'name' => 'Test Feed',
          'url' => 'http://rss.feed'
        ];

        $rssFeed = RssFeed::create($feedData);

        $this->put(
            "api/rss-feeds/{$rssFeed->id}",
            ['name' => 'Modified', 'url' => 'http://modi.fied'],
            ['Accept' => 'application/json']
        )->assertStatus(200);

        $this->assertDatabaseHas('rss_feeds', ['name' => 'Modified', 'url' => 'http://modi.fied']);
    }

    public function testEditFeedNoNameValidation()
    {
        $feedData = [
            'name' => '',
            'url' => 'http://rss.feed'
        ];

        $rssFeed = RssFeed::create($feedData);

        $this->put("api/rss-feeds/{$rssFeed->id}", $feedData, ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJsonFragment(['errors' => ['name' => ['The name field is required.']]]);
    }

    public function testEditFeedUrlValidation()
    {
        $feedData = [
            'name' => 'Test Feed',
            'url' => 'httpssss'
        ];

        $rssFeed = RssFeed::create($feedData);

        $this->put("api/rss-feeds/{$rssFeed->id}", $feedData, ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJsonFragment(['errors' => ['url' => ['The url format is invalid.']]]);
    }
}
