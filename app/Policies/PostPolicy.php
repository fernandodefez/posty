<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can update the post.
     *
     * @param  User  $user
     * @param  Post $post
     *
     * @return bool
     */
    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  User  $user
     * @param  Post $post
     *
     * @return bool
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * @param User $user
     * @param Post $post
     *
     * @return bool
     */
    public function like(User $user, Post $post): bool
    {
        return !$post->likes->contains('user_id', $user->id);
    }
}
