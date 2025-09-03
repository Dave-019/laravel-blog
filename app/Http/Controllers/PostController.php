<?php

namespace App\Http\Controllers;

use App\Models\Post; // <-- Add this line
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Method to display a list of all posts
public function index()
{
    $posts = Post::latest()
        ->with('author', 'category', 'tags')
        ->when(request('search'), function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('body', 'like', '%' . $search . '%');
        })
        ->get();

    return view('posts.index', [
        'posts' => $posts
    ]);
}

    // Method to display a single post
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}