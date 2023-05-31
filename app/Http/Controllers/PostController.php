<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Get all post
        // $posts = Post::get(); // return Collection

        // Pagination
        $posts = Post::paginate(20); // return LengthAwarePaginator also contain a Collection containing posts
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
            'body' => 'required'
        ]);

        // grab currently authenticate user
        // $request->user()->id;
        // auth()->user()->id; or auth()->id();

        // create a post (through a user)
        $request->user()->posts()->create(
        [
            // laravel behind the scence using this relationship setup
            // will automatically fill in the user_id for us
            'body' => $request->body
        ]
        // $request->only('body') only method will return an array
    );
        
        return back();
    }
}
