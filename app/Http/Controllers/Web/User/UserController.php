<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * This method returns the user's posts
     *
     * @param User $user
     * @return View
     */
    public function index(User $user): View
    {
        return view('users.index')->with([
            'user' => $user,
            'posts' => $user->posts()->with(['user', 'likes'])->withCount('likes')->latest()->paginate(5)
        ]);
    }
}
