@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Review Details</h1>
        <a href="{{ route('reviews.index') }}" class="btn btn-secondary mb-3">Go back to list</a>

        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 200px">Review ID</th>
                        <td>{{ $review->id }}</td>
                    </tr>
                    <tr>
                        <th>Book</th>
                        <td>
                            {{ $review->book->title }} 
                            <a href="{{ route('books.show', $review->book->id) }}" class="btn btn-info btn-sm ms-2">View Book</a>
                        </td>
                    </tr>
                    <tr>
                        <th>Content</th>
                        <td><div style="max-width: 600px;">{{ $review->content }}</div></td>
                    </tr>
                    <tr>
                        <th>Rating</th>
                        <td>{{ $review->rating }}</td>
                    </tr>
                    <tr>
                        <th>Author</th>
                        <td>{{ $review->book->author->name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
