<?php

namespace App\Http\Controllers\Web\Post;

use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['show']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $storePostRequest
     * @param PostService $postService
     * @return RedirectResponse
     */
    public function store(StorePostRequest $storePostRequest, PostService $postService): RedirectResponse
    {
        $postService->create($storePostRequest);
        $post = $storePostRequest->user()->posts()->latest()->first();
        $storePostRequest->session()->flash('success', 'The post was successfully created');
        return redirect()->route('posts.show', ['post' => $post]);
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit')->with(['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UpdatePostRequest $updatePostRequest
     * @param Post $post
     * @param PostService $postService
     *
     * @return RedirectResponse
     */
    public function update(UpdatePostRequest $updatePostRequest, Post $post, PostService $postService): RedirectResponse
    {
        $postService->update($post, $updatePostRequest);
        $updatePostRequest->session()->flash('success', 'The post was successfully updated');
        return redirect()->route('posts.show', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @param PostService $postService
     *
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Post $post, PostService $postService): RedirectResponse
    {
        $this->authorize('delete', $post);
        $postService->destroy($post);
        return redirect('/users/' . $post->user->username)->with('success', 'The post was successfully removed');
    }
}

