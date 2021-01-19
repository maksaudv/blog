@extends('layout')

@section('content')
<h2>Edit category</h2>

<form action="{{ route('categories.update', $category) }}" method="post">
    @csrf
    @method('PUT')

    <label for="name">Category name</label>
    <input type="text" name="name" id="name" value="{{ $category->name }}">
    <input type="submit" value="Submit">
</form>

@endsection
