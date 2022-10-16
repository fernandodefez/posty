<?php

namespace App\Services;

use App\Mail\PostLiked;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LikeService
{
    public function create(Post $post, Request $request)
    {
        $user = $request->user();

        if (
            !$post->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count()
        ) {
            $post->likes()->create(['user_id' => $user->id]);
            //The mail will not be sent when the user likes its own post,
            if (
                $user->id !== $post->user->id
            ) {
                Mail::to($post->user)->send(new PostLiked($request->user(), $post));
            }
        } else {
            $post->likes()->where('user_id', $user->id)->restore();
        }
    }

    public function restore(User $user, Post $post)
    {
        $post->likes()->where('user_id', $user->id)->restore();
    }

    public function destroy(Post $post, User $user)
    {
        $user->likes()->where(['post_id' => $post->id])->delete();
    }
}
