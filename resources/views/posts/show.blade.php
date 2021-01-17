@extends('layout')
@section('content')

    <div>
        <h2>{{ $post->title }}</h2>
        <strong>{{ $post->category->name }}</strong>
        <p>{{ $post->content }}</p>
    </div>
    <a href="{{ route('posts.edit', $post) }}">Edit post</a>

@endsection