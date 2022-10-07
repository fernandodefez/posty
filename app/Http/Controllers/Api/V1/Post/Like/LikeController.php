<?php

namespace App\Http\Controllers\Api\V1\Post\Like;

use App\Http\Controllers\Controller;
use App\Http\Resources\LikeResource;
use App\Models\Like;
use App\Models\Post;
use App\Services\LikeService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(['store','destroy']);
    }

    public function index(Post $post): AnonymousResourceCollection
    {
        return LikeResource::collection(Like::with(['user'])->where('post_id', $post->id)->latest()->paginate(5));
    }

    public function store(Post $post, Request $request, LikeService $likeService): JsonResponse
    {
        $this->authorize('like', $post);
        $likeService->create($post, $request->user());
        return response()->json([
            'status' => '201',
            'message' => 'You liked this post.'
        ]);
    }

    public function destroy(Post $post, Request $request, LikeService $likeService): JsonResponse
    {
        $likeService->destroy($post, $request->user());
        return response()->json([
            'status' => '200',
            'message' => 'You unliked this post.'
        ]);
    }
}
