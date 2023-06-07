<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // Create method to say can we do a paticular thing, in this case can we delete a post
    // recieved by default the currently authenticated user
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
