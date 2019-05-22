<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewServerListTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {

        //Arrange
        //Create a server

        //Act
        //go to the server list

        //Assert
        //Check to see server data
        
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
