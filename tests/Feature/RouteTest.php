<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPost()
    {
        $response = $this->withHeaders([])->json('POST', '/route', ['from' => 'RKD', 'to' => 'DPS', 'price' => '16']);

        $response
            ->assertStatus(200)
            ->assertJson(["success"]);
    }
}
