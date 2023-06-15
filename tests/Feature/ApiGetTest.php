<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Api/eventGetを呼び出したときHTTPステータス200 OKが帰ってくるかのテスト
 */

class ApiGetTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_events(): void
    {
        $response = $this->postJson('/api/eventGet');

        $response->assertStatus(200);

        //$response->dd();
    }
}
