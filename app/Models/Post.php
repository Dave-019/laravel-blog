<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    /**
     * Defines the relationship between a Post and its Author (a User).
     * A Post BELONGS TO a User.
     */
    public function author(): BelongsTo
    {
        // This tells Laravel that the 'user_id' column on this table
        // connects to the 'id' on the User model.
        return $this->belongsTo(User::class, 'user_id');
    }
        public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function tags():Belongstomany
    {
        return $this->belongsToMany(Tag::class);
    }
        public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
        protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'user_id',
        'category_id',
        'thumbnail'
    ];
}