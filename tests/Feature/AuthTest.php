<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\WithStubUser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthTest extends TestCase
{

    use DatabaseMigrations, WithStubUser;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:refresh --seed');
    }

    public function testRegisterFormDisplayed()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function testRegistersAValidUser()
    {
        $this->post('register', [
            'name' => 'alex',
            'email' => 'alex@simon.com',
            'password' => 'secretsecret',
            'password_confirmation' => 'secretsecret'
        ])
            ->assertRedirect('/home');

        $this->assertAuthenticated();
    }

    public function testDoesNotRegisterAnInvalidUser()
    {
        $response = $this->post('register', [
            'name' => 'alex',
            'email' => 'alex@simon.com',
            'password' => 'secretsecret',
            'password_confirmation' => 'wrongsecret'
        ]);
        $response->assertSessionHasErrors();
        $this->assertGuest();
    }
}
