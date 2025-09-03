<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        // Load the posts for this category, along with their authors
        $posts = $category->posts()->with('author', 'category')->latest()->get();

        // Pass the posts and the category to the view
        return view('posts.index', [
            'posts' => $posts,
            'pageTitle' => 'Posts in: ' . $category->name // We'll add a title to the page
        ]);
    }
}