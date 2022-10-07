<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return UserResource
     */
    public function index(User $user): UserResource
    {
        return new UserResource($user->load('posts', 'likes'));
    }
}
