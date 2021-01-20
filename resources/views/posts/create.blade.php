@extends('layout')

@section('content')

<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <strong>Create post</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class="form-control-label" for="title">Title</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input class="form-control" type="text" name="title" id="title">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="category_id" class="form-control-label">Category</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="category_id" id="category_id" placeholder="select a category">
                            @foreach ($categories as $category)

                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class="form-control-label" for="content">Content</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="content" id="content" rows="9" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class="form-control-label" for="image">Image</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i>
                        Create 
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
