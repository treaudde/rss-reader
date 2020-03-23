<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testLoadApp()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSeeText('Rss Feed Reader');
    }
}
