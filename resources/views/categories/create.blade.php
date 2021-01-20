@extends('layout')

@section('content')

<div class="card">
    <div class="card-header">
        Create category
    </div>
    <div class="card-body card-block">
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="text" class=" form-control-label">Category name</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Create
                </button>
            </div>
        </form>
    </div>

</div>

@endsection
