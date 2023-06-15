<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * Calendar.vueがリクエストされたときHTTPステータス200 OKが帰ってくるかのテスト
 */

class CalendarTest extends TestCase
{
    /**
     * 基本的なテスト例
     */
    public function test_Calendar(): void
    {
        $response = $this->get('/calendar');

        $response->assertStatus(200);
    }
}