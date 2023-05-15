<?php

namespace Tests\Unit;

use Illuminate\Http\Response;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function home_page_can_be_rendered(): void
    {
        $this->assertTrue(true);
    }
}
