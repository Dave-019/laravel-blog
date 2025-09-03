<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        // 1. Ensure the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // 2. Validate the request
        $request->validate([
            'body' => 'required|string|max:2500',
        ]);

        // 3. Create the comment
        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => $request->input('body'),
        ]);

        // 4. Redirect back to the post
        return back()->with('success', 'Comment posted successfully.');
    }
}