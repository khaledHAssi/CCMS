<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserRegistration()
    {
        $userData = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'username' => $this->faker->name,
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->post('/register', $userData);

        $response->assertRedirect('/');


    }
    public function testFailedRegistration()
    {
        // Create a user
        $user = User::factory()->create();

        // Attempt to register with an existing email
        $response = $this->post('/register', [
            'name' => $this->faker->name,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        // Assert that the user is not created in the database
        $this->assertDatabaseMissing('users', [
            'email' => $user->email,
        ]);

        // Assert that the user is redirected back to the registration page
        $response->assertRedirect('/register');
    }
    public function test_example()
    {
        $this->assertTrue(true);
    }
}
