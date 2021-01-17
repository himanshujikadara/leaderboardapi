<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MemberTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUsersList()
    {
        $this->json('GET', 'api/users', ['Accept' => 'application/json'])
        ->assertStatus(200);
    }

    public function testShowUser()
    {
        $this->json('GET', '/api/user/show/1', ['Accept' => 'application/json'])
        ->assertStatus(200)
        ->assertJsonFragment([
            'name' => 'Emma',
        ]);
    }

    public function testRequiredFieldsForAddUsers()
    {
        $this->json('POST', '/api/user/add', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonFragment([
                        "name" => [
                            "The name field is required."
                        ],
                        "age" => [
                            "The age field is required."
                        ],
                        "address" => [
                            "The address field is required."
                        ]
            ]);
    }

    public function testAddUsers()
    {
        $userData = [
            "name" => "Mr. John Doe",
            "age" => 28,
            "address" => "Canada"
        ];

        $this->json('POST', '/api/user/add', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonFragment([
                        "message" => "great, user added successfully!",                        
            ]);            
    }

    public function testPlus()
    {
        $userData = [
            "id" => 1
        ];

        $this->json('PUT', '/api/user/plus', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                [
                    'id',
                    'name',
                    'age',
                    'points',
                    'address',
                ]
            ]);
    }

    public function testMinus()
    {
        $userData = [
            "id" => 1
        ];

        $this->json('PUT', '/api/user/minus', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                [
                    'id',
                    'name',
                    'age',
                    'points',
                    'address',
                ]
            ]);
    }

    public function testDeleteUser()
    {
        $this->json('DELETE', '/api/user/delete/10', ['Accept' => 'application/json'])
        ->assertStatus(200);
    }
}
