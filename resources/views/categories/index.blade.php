@extends('layout')
@section('content')

@foreach ($categories as $category)
<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">
                <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
            </strong>
        </div>
        <div class="card-body">   
        <a href="{{ route('categories.edit', $category) }}">Edit category</a>
        <form action="{{ route('categories.destroy', $category) }}" method='post'>
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete category">
        </form>
        </div>
    </div>
</div>
@endforeach

@endsection
