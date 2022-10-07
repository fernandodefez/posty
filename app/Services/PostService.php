<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;

class PostService
{
    public function create(Request $request)
    {
        $user = $request->user();
        $user->posts()->create([
            'user_id' => $user->id,
            'body' => $request->body
        ]);
    }

    public function update(Post $post, Request $request)
    {
        $post->update([
            'body' => $request->body
        ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
    }
}
