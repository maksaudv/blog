<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    function index() {
        return view('categories.index', ['categories' => Category::all()]);
    }

    function create() {
        return view('categories.create')->with('categories', Category::all());
    }

    function store(Request $request) {
        $slug = Str::slug($request['name']);
        Category::create(array_merge($request->all(), compact('slug')));
        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    function show(Category $category) {
        return view('categories.show', ['category' => $category,
                                        'posts' => $category->posts]);
    }

    function edit(Category $category) {
        return view('categories.edit', ['category' => $category]);
    }

    function update(Request $request, Category $category) {
        $slug = Str::slug($request['name']);
        $category->update(array_merge($request->all(), compact('slug')));
        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully');
    }

    function destroy(Category $category) {
        Category::destroy($category->id);
        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
