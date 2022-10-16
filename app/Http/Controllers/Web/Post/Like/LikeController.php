<?php

namespace App\Http\Controllers\Web\Post\Like;

use App\Http\Controllers\Controller;
use App\Mail\PostLiked;
use App\Models\Like;
use App\Models\Post;
use App\Services\LikeService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['store', 'destroy']);
    }

    public function index(Post $post): View
    {
        $likes = Like::withoutTrashed()->with(['user'])->where('post_id', $post->id)->latest()->paginate(10);

        return view('posts.likes.index')->with([
            'post' => $post,
            'likes' => $likes
        ]);
    }

    public function store(Post $post, Request $request, LikeService $likeService): RedirectResponse
    {
        $this->authorize('like', $post);
        $likeService->create($post, $request);
        return back();
    }

    public function destroy(Post $post, Request $request, LikeService $likeService): RedirectResponse
    {
        $likeService->destroy($post, $request->user());
        return back();
    }
}
