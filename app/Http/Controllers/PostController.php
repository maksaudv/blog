<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    function index() {
        return view('posts.index')->with('posts', Post::all());
    }

    function create() {
        return view('posts.create')->with('categories', Category::all());
    }

    function store(Request $request) {
        $slug = Str::slug($request['title']);
        $post = array_merge($request->all(), compact('slug'));
        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    function show(Post $post) {
        return view('posts.show', compact('post'));
    }

    function edit(Post $post) {
        return view('posts.edit', ['post' => $post,
                                   'categories' => Category::all()]);
    }

    function update(Request $request, Post $post) {
        $slug = Str::slug($request['title']);
        $post->update(array_merge($request->all(), compact('slug')));
        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    function destroy(Post $post) {
        Post::destroy($post->id);
        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }
}
