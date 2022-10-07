<?php

namespace App\Http\Controllers\Api\V1\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    public function index(): AnonymousResourceCollection
    {
        return PostResource::collection(Post::with(['user', 'likes'])->latest()->paginate(5));
    }

    /**
     *
     * @param StorePostRequest $storePostRequest
     * @param PostService $postService
     *
     * @return JsonResponse
     */
    public function store(StorePostRequest $storePostRequest, PostService $postService): JsonResponse
    {
        $postService->create($storePostRequest);
        return response()->json([
            'status' => 201,
            'message' => 'The post was successfully created',
        ], 201);
    }

    /**
     * @param Post $post
     *
     * @return PostResource
     */
    public function show(Post $post): PostResource
    {
        return new PostResource($post->load('likes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function edit(Post $post): JsonResponse
    {
        $this->authorize('update', $post);
        return response()->json([
            'status' => 200,
            'message' => new PostResource($post->load('likes'))
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UpdatePostRequest $updatePostRequest
     * @param Post $post
     * @param PostService $postService
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(UpdatePostRequest $updatePostRequest, Post $post, PostService $postService): JsonResponse
    {
        $this->authorize('update', $post);
        $postService->update($post, $updatePostRequest);
        return response()->json([
            'status' => 200,
            'message' => 'The post was successfully updated'
        ]);
    }

    /**
     * @param Post $post
     * @param Request $request
     * @param PostService $postService
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function destroy(Post $post, Request $request, PostService $postService): JsonResponse
    {
        $this->authorize('delete', $post);
        $postService->destroy($post);
        return response()->json([
            'status' => 200,
            'message' => 'The post was successfully removed'
        ]);
    }
}
