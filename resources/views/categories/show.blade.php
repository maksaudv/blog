@extends('layout')
@section('content')

<p>{{ $category->name }}</p>
<a href="{{ route('categories.edit', $category) }}">Edit category</a>
<form action="{{ route('categories.destroy', $category) }}" method='post'>
    @csrf
    @method('DELETE')
    <input type="submit" value="Delete category">
</form>


<div class="row">

@foreach ($category->posts as $post)
<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <strong class="card-title"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                <small>
                    <span class="badge badge-danger float-right mt-1">
                        <a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a>
                    </span>
                </small>
            </strong>
        </div>
        <img class="card-img-top" src="images/bg-title-01.jpg" alt="Card image cap">
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
@endforeach
</div>

@endsection
