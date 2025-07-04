@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit a Review</h1>
        <a href="{{ route('reviews.index') }}" class="btn btn-secondary mb-3">Go back to list</a>
        <form action="{{ route('reviews.update', $review->id) }}" method="post" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="id" class="form-label">Review ID</label>
                <input type="number" id="id" class="form-control" value="{{ $review->id }}" disabled>
            </div>
            <div class="mb-3">
                <label for="book_id" class="form-label">Book</label>
                <select name="book_id" id="book_id" class="form-select" required>
                    <option value="">Select a book</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ $review->book_id == $book->id ? 'selected' : '' }}>
                            {{ $book->title }} (by {{ $book->author->name }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" class="form-control" rows="4" style="max-width: 600px;" required>{{ $review->content }}</textarea>
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input type="number" name="rating" id="rating" class="form-control" value="{{ $review->rating }}" min="1" max="5" required>
            </div>
            @if(isset($error))
                <div class="text-danger">{{ $message }}</div>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
@endsection
