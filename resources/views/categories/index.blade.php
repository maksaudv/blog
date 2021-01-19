@extends('layout')
@section('content')
<a href="{{ route('categories.create') }}">Create new category</a>
@foreach ($categories as $category)
    <div>
        <h2>
            <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
        </h2>
        <a href="{{ route('categories.edit', $category) }}">Edit category</a>
        <form action="{{ route('categories.destroy', $category) }}" method='post'>
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete category">
        </form>
    </div>
@endforeach

@endsection
