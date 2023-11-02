<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\User;

use App\Models\Tweet;

class TweetsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_user_create_a_tweet_with_login()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->call('POST', route('store-tweet'), ['tweet' => 'Testing my tweet']);

        $this->assertEquals(302, $response->status());

        $this->assertDatabaseHas('tweets', [
            'tweet' => 'Testing my tweet',
        ]);
    }

    public function test_user_follow_someone()
    {
        $userOne = User::factory()->create();
        $userTwo = User::factory()->create();

        $userTwo->followings()->attach($userOne);

        $this->assertDatabaseHas('user_followers', [
            'user_id' => $userOne->id,
            'follower_id' => $userTwo->id
        ]);

        $this->assertGreaterThan(0, $userTwo->followings()->count());

        $this->assertGreaterThan(0, $userOne->followers()->count());
    }

}
