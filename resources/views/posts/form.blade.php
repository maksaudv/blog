<form action="{{ route('posts.store') }}" method="post">
    @csrf

    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="{{ $post->title ?? ''}}">
    <label for="category_id">Category</label>
    <select name="category_id" id="category_id" placeholder="select a category">
        @foreach ($categories as $category)

        <option value="{{ $category->id }}" @if($post ?? '') {{ ($category->id == $post->category->id) ? 'selected' : '' }} @endif>
        {{ $category->name }}
        </option>

        @endforeach
    </select>

    <label for="content">Content</label>
    <input type="text" name="content" id="content" value="{{ $post->content ?? ''}}">

    <input type="submit" value="Submit">
</form>