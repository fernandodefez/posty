<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;

class LikeService
{
    public function create(Post $post, User $user)
    {
        $post->likes()->create([
            'user_id' => $user->id
        ]);
    }

    public function destroy(Post $post, User $user)
    {
        $user->likes()->where(['post_id' => $post->id])->delete();
    }
}
