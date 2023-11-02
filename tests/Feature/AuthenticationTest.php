<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Crypt;

class AuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $user = User::factory()->create();

        // $user = User::first();
// dd($user);
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => "password",
        ]);
// dd($response);
        // $response = $this->withToken(['email' => $user->email, 'password' => 'password'])
        //              ->post('/login');

         // Generate a CSRF token
    // $token = Crypt::encrypt(csrf_token());

    // $response = $this->withHeaders(['X-CSRF-TOKEN' => $token])
    //                  ->post('/login', [
    //                      'email' => $user->email,
    //                      'password' => $user->password,
    //                  ]);

        // dd($response);
        // $this->assertTrue(true);
        $this->assertAuthenticated();
        // dd(RouteServiceProvider::HOME);
       $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
