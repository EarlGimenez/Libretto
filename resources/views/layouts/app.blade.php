<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libretto-jspelecb22</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-primary text-white py-3">
        <div class="container">
            <h1 class="mb-3">Welcome to Libretto-jspelecb22</h1>
            <nav class="nav nav-pills d-flex align-items-center">
                @auth
                    <a class="nav-link text-white" href="{{ route('authors.index') }}">Authors</a>
                    <a class="nav-link text-white" href="{{ route('books.index') }}">Books</a>
                    <a class="nav-link text-white" href="{{ route('genres.index') }}">Genres</a>
                    <a class="nav-link text-white" href="{{ route('reviews.index') }}">Reviews</a>

                    <div class="ms-auto">
                        <a class="nav-link text-white" href="{{ route('logout') }}">
                            <button type="button" class="btn btn-danger">Logout</button>
                        </a>
                    </div>
                @endauth
            </nav>
        </div>
    </header>

    <main class="container my-4">
        @yield('content')
    </main>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>