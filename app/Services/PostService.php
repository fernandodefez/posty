<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PostService
{
    public function create(Request $request)
    {
        $user = $request->user();

        $filename = time().'.'.$request->picture->extension();

        // Public Folder
        $request->file('picture')->storeAs('public/posts', $filename);

        $user->posts()->create([
            'user_id' => $user->id,
            'title' => $request->title,
            'body' => $request->body,
            'picture' => $filename
        ]);
    }

    public function update(Post $post, Request $request)
    {
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'picture' => ''
        ]);
    }

    public function search($search): Builder
    {
        return Post::with(['user', 'likes'])
            ->where('body', 'LIKE', '%' . $search . '%');
    }

    public function destroy(Post $post)
    {
        $post->delete();
    }
}

