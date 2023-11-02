<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// use App\Models\Comment;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Support\Facades\URL;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::factory(10)->create();

        // User::factory()
        // ->has(Tweet::factory()->count(3))
        // ->create();

        // Tweet::factory()->has(Comment::factory()->count(3)->create());


        // \App\Models\Tweet::factory(10)->create();

        // \App\Models\Comment::factory(10)->create();

        // $user = User::factory()->create();

        // $tweet = Tweet::factory()
        //     ->count(3)
        //     ->for($user)
        //     // ->has(Comment::factory()->count(2))
        //     ->create();

        // $comment = Comment::factory()
        //     ->count(3)
        //     ->for($user)
        //     ->for($tweet)
        //     // ->has(Comment::factory()->count(2))
        //     ->create();


        
        User::factory(10)->create()
            ->each(function($user){
            Tweet::create([
                'user_id' => $user->id,
                'tweet' => fake()->sentence(15),
                'likes' => fake()->randomNumber(2),
                // 'media' => public_path()."/assets/media/tweet-post.jpg"
                'media' => URL::to("/assets/media/tweet-post.jpg")
                // 'media' => base_path()."/assets/media/tweet-post.jpg"
            ])->each(function($tweet)use($user){
                $tweet->comments()->create([
                    'comment' => fake()->sentence(),
                    'user_id' => $user->id,
                    'tweet_id' => $tweet->id
                ]);
            });
        });  


        
    }
}
