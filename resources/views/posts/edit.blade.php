@extends('layout')

@section('content')
<h2>Edit post</h2>

<form action="{{ route('posts.update', $post) }}" method="post">
    @csrf
    @method('PUT')

    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="{{ $post->title }}">
    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" placeholder="select a category">
        @foreach ($categories as $category)

        <option value="{{ $category->id }}" {{ ($category->id == $post->category->id) ? 'selected' : '' }}>
        {{ $category->name }}
        </option>

        @endforeach
    </select>

    <label for="content">Content</label>
    <input type="text" name="content" id="content" value="{{ $post->content }}">

    <input type="submit" value="Submit">
</form>
<form action="{{ route('posts.destroy', $post) }}" method='post'>
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete post">
        </form>
@endsection