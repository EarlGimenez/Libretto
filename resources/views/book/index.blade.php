@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Books</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Create a New Book</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Book ID</th>
                        <th>Book Title</th>
                        <th>Book Author</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this book?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $books->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection