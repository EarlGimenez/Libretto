@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Genre Details</h1>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary mb-3">Go back to list</a>

        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 200px">Genre ID</th>
                        <td>{{ $genre->id }}</td>
                    </tr>
                    <tr>
                        <th>Genre Name</th>
                        <td>{{ $genre->name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="my-4">Books in this Genre</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Book ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($genre->books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection