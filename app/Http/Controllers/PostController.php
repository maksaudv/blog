<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    function index(Category $category = null) {
        $posts = $category ? $category->posts : Post::all();
        return view('posts.index', [
            'posts' => $posts,
            'categories' => Category::all(),
            ]);
    }

    function create() {
        return view('posts.create')->with('categories', Category::all());
    }

    function store(Request $request) {  

        $slug = Str::slug($request['title']);
        Post::create(array_merge($request->all(), compact('slug')));
        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    function show(Category $category, Post $post) {
        return view('posts.show', compact('post'));
    }

    function edit(Category $category, Post $post) {
        return view('posts.edit', ['post' => $post,
                                   'categories' => Category::all()]);
    }

    function update(Request $request, Category $category, Post $post) {
        $slug = Str::slug($request['title']);
        $post->update(array_merge($request->all(), compact('slug')));
        return redirect()->route('posts.show', ['post' => $post,
                                                'success' => 'Post updated successfully']);
    }

    function destroy(Category $category, Post $post) {
        Post::destroy($post->id);
        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }
}
