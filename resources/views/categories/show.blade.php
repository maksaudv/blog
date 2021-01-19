@extends('layout')
@section('content')

<p>{{ $category->name }}</p>

@foreach($posts as $post)
    <p><a href="{{ route('posts.show', [$category, $post]) }}">{{ $post->title }}</a></p>
@endforeach

@endsection
