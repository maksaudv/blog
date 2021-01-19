@section('categories')
@foreach($categories as $category)
<li>
    <a href="{{ route('posts.index', $category) }}">{{ $category->name }}</a>
</li>
@endforeach
@endsection