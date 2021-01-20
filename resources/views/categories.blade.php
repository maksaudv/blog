@section('categories')
@foreach(Category::all() as $category)
<li>
    <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
</li>
@endforeach
@endsection