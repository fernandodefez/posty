<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(PostService $postService): View
    {
        if (!empty(request('search'))) {
            $posts = $postService->search(request('search'))->inRandomOrder()->paginate(10);
        } else {
            $posts = Post::with(['user', 'likes'])->inRandomOrder()->paginate(10);
        }
        return view('home', [
            'posts' => $posts
        ]);
    }

}
