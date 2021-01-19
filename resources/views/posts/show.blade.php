@extends('layout')
@section('content')

    <div>
        <h2>{{ $post->title }}</h2>
        <strong>{{ $post->category->name }}</strong>
        <p>{{ $post->content }}</p>
    </div>
    <a href="{{ route('posts.edit', [$post->category, $post]) }}">Edit post</a>
    <form action="{{ route('posts.destroy',[$post->category, $post]) }}" method='post'>
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete post">
    </form>

@endsection
