<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExaHomePageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function home_page_can_be_rendered(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
