<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
    ];

    // Check if a paticular user has liked a post
    public function likedBy(User $user)
    {
        // accessing post and like relationship in the Post model
        return $this->likes->contains('user_id', $user->id); 
    }


    // Ties relationship back to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
