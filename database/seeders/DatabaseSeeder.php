<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* \App\Models\User::factory(10)->create();
        //User::factory(2)
            ->create();*/

        /* \App\Models\User::factory(10)->create();
        User::factory(2)
            ->create()
            ->each(function ($user){
                Post::factory()->create([
                    'user_id' => $user->id
                ]);
            });*/

        User::factory(5)
            ->create()
            ->each(function ($user) {
                Post::factory(rand(1, 10))->create([
                    'user_id' => $user->id
                ])->each(function ($post) {
                    for ($i = 0; $i <= rand(1,5); $i++) {
                        Like::create([
                            'post_id' => $post->id,
                            'user_id' => rand(1, 5)
                        ]);
                    }
                });
            });
    }
}
