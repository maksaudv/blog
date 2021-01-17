@extends('layout')

@section('content')

<h2>Create new post</h2>

<form action="{{ route('posts.store') }}" method="post">
    @csrf

    <label for="title">Title</label>
    <input type="text" name="title" id="title">
    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" placeholder="select a category">
        @foreach ($categories as $category)

        <option value="{{ $category->id }}">
        {{ $category->name }}
        </option>

        @endforeach
    </select>

    <label for="content">Content</label>
    <input type="text" name="content" id="content">

    <input type="submit" value="Submit">
</form>

@endsection