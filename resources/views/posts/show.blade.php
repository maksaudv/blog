@extends('layout')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">{{ $post->title }}
                <small>
                    <span class="badge badge-danger float-right mt-1">
                        {{ $post->category->name }}
                    </span>
                </small>
            </strong>
        </div>
        <img class="card-img-top" src="/images/bg-title-01.jpg" alt="Card image cap">
        <div class="card-body">
            <p class="card-text">{{ $post->content }}</p>
            <a href="{{ route('posts.edit', $post) }}">Edit post</a>
            <form action="{{ route('posts.destroy', $post) }}" method='post'>
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete post">
            </form>
        </div>
    </div>
</div>
@endsection
