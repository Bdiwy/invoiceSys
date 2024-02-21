<?php

namespace Tests\Feature\invoices;

use Faker\Provider\Lorem;
use Hamcrest\Description;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SectionInvoicTest extends TestCase
{
    use RefreshDatabase ;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $data=[
            'section_name'=>'QNP',
            'description'=>'Lorem ipsum dolor',
            'Created_by'=>'hero'
        ];
        $response =$this->post('/add-sections/create', $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('sections',$data);
        // $response->assertJson($data);
    
    }
    public function testdata(){
        $response =$this->get('/data');
        // $response->assertStatus(200);
        $response->getContent();
        
    }
}
