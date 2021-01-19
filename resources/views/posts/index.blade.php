@extends('layout')
@section('content')
<a href="{{ route('posts.create') }}">Create new post</a>

<ul>
    @foreach($categories as $category)
    <li><a href="{{ route('posts.index', $category) }}">{{ $category->name }}</a></li>
    @endforeach
</ul>

@foreach ($posts as $post)
    <div>
        <h2>
            <a href="{{ route('posts.show', [$post->category, $post]) }}">{{ $post->title }}</a>
        </h2>
        <strong>{{ $post->category->name }}</strong>
        <p>{{ $post->content }}</p>
        <a href="{{ route('posts.edit', [$post->category, $post]) }}">Edit post</a>
        <form action="{{ route('posts.destroy', [$post->category, $post]) }}" method='post'>
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete post">
        </form>
    </div>
@endforeach

@endsection
