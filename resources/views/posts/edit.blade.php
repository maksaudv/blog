@extends('layout')

@section('content')
<h2>Edit post</h2>

<form action="{{ route('posts.update', [$post->category, $post]) }}" method="post">
    @csrf
    @method('PUT')

    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="{{ $post->title }}">
    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" placeholder="select a category">
        @foreach ($categories as $category)

        <option value="{{ $category->id }}" {{ ($category == $post->category) ? 'selected' : '' }}>
        {{ $category->name }}
        </option>

        @endforeach
    </select>

    <label for="content">Content</label>
    <input type="text" name="content" id="content" value="{{ $post->content }}">

    <input type="submit" value="Save">
</form>
@endsection
