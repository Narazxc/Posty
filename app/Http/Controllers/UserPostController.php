<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    //
    public function index(User $user)
    {
        // Goal
        // Grab the currently authenticated user
        // Show a list of their posts and other related infomations

        $posts = $user->posts()->with(['user', 'likes'])->paginate(20); // eager load the user and the likes into this


        return view('users.posts.index', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
