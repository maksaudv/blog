<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <a href="{{ route('posts.index') }}">Posts</a>
        <a href="{{ route('categories.index') }}">Categories</a>
    </header>
    @yield('content')
</body>
</html>
