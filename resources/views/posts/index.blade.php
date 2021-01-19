@extends('layout')

@include('categories')

@section('content')
@foreach ($posts as $post)
<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <strong class="card-title"><a href="{{ route('posts.show', [$post->category, $post]) }}">{{ $post->title }}</a>
                <small>
                    <span class="badge badge-danger float-right mt-1">
                        <a href="{{ route('posts.index', $post->category) }}">{{ $post->category->name }}</a>
                    </span>
                </small>
            </strong>
        </div>
        <img class="card-img-top" src="images/bg-title-01.jpg" alt="Card image cap">
        <div class="card-body">
            <p class="card-text">{{ $post->content }}</p>
            <a href="{{ route('posts.edit', [$post->category, $post]) }}">Edit post</a>
            <form action="{{ route('posts.destroy', [$post->category, $post]) }}" method='post'>
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete post">
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection
