<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'user_id', 'post_id']; // Allow mass assignment

    // A comment belongs to a post
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    // A comment belongs to an author (user)
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}