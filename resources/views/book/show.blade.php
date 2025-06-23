@extends('layouts.app')

@section('content')
    <h1>Show Book</h1>
    <a href="{{ route('books.index') }}">Go back to list</a>
    <h3>Book ID:</h3>{{ $book->id }}<br>
    <h3>Book Title:</h3>{{ $book->title }}<br>
    <h3>Book Author:</h3>{{ $book->author->name }}<br>
    <h3>Genres:</h3>
    <ul>
        @foreach($book->genres as $genre)
            <li>{{ $genre->name }}</li>
        @endforeach
    </ul>
    <h3>Reviews:</h3>
    <ul>
        @foreach($book->reviews as $review)
            <li>
                <strong>Rating:</strong> {{ $review->rating }}<br>
                <strong>Content:</strong> {{ $review->content }}<br>
                <a href="{{ route('reviews.show', $review->id) }}">Show</a>
                <a href="{{ route('reviews.edit', $review->id) }}">Edit</a>
                <form action="{{ route('reviews.destroy', $review->id) }}" method="post" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this review?');">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
    <h3>Add a Review:</h3>
    <form action="{{ route('reviews.store') }}" method="post">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        Content:<br>
        <textarea name="content" required></textarea><br>
        Rating:<br>
        <input type="number" name="rating" min="1" max="5" required><br>
        <input type="submit" value="Add Review">
    </form>
@endsection
