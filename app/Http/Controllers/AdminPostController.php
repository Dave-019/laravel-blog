<?php

namespace App\Http\Controllers;

use App\Models\Post; 
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::latest()->paginate(10)
        ]);
    }
    public function create()
    {
        return view('admin.posts.create');
    }
    public function store(Request $request)
    {
       // 1. Validate the incoming data
    $attributes = $request->validate([
        'title' => 'required|max:255',
        'slug' => ['required', Rule::unique('posts', 'slug'), 'max:255'],
        'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'excerpt' => 'required',
        'body' => 'required',
    ]);
        if ($request->hasFile('thumbnail')) {
        $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
    }

    // 2. Add the authenticated user's ID
    $attributes['user_id'] = auth()->id();

    // 3. For now, we will hard-code a category ID. We'll build the selector later.
    $attributes['category_id'] = 1; 

    // 4. Create the post
    Post::create($attributes);

    // 5. Redirect back with a success message
    return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.'); 
    }
    public function edit(Post $post)
{
    $this->authorize('update', $post);
    return view('admin.posts.edit', ['post' => $post]);
}

public function update(Request $request, Post $post)
{
    $this->authorize('update', $post);

    // 1. Validate the incoming data
    $attributes = $request->validate([
        'title' => 'required|max:255',
        'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id), 'max:255'],
        'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'excerpt' => 'required',
        'body' => 'required',
    ]);

    // 2. Handle the file upload if a new one is provided
    if ($request->hasFile('thumbnail')) {
        // Optional: Delete the old thumbnail if it exists
        // Storage::disk('public')->delete($post->thumbnail);

        $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
    }

       
        $post->update($attributes);

        // 4. Redirect back with a success message
        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }
    // ... inside AdminPostController ...

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post); 
        $post->delete();

        
        return back()->with('success', 'Post deleted successfully.');
    }
}