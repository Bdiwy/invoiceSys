<?php

namespace Tests\Feature\invoices;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class invoictest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->delete('/testest');
        // dd($response->getStatuscode());
        $response->assertStatus(200);
    }
}
