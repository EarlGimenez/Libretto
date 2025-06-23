<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Libretto-jspelecb22</title>
</head>
<body>
    <header>
        <h1>Welcome to Libretto-jspelecb22</h1>
        <ul>
            <li><a href="{{ route('authors.index') }}">Authors</a></li>
            <li><a href="{{ route('books.index') }}">Books</a></li>
            <li><a href="{{ route('genres.index') }}">Genres</a></li>
            <li><a href="{{ route('reviews.index') }}">Reviews</a></li>
        </ul>
    </header>

    @yield('content')
</body>
</html>