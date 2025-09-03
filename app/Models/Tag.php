<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // Add this

class Tag extends Model
{
    use HasFactory;

    // A Tag can belong to many Posts
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}