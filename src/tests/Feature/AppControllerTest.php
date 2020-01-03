<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppControllerTest extends TestCase
{
    use RefreshDatabase;

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
