@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Book Details</h1>
        <a href="{{ route('books.index') }}" class="btn btn-secondary mb-3">Go back to list</a>

        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 200px">Book ID</th>
                        <td>{{ $book->id }}</td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td>{{ $book->title }}</td>
                    </tr>
                    <tr>
                        <th>Author</th>
                        <td>
                            {{ $book->author->name }}
                            <a href="{{ route('authors.show', $book->author->id) }}" class="btn btn-info btn-sm ms-2">View Author</a>
                        </td>
                    </tr>
                    <tr>
                        <th>Genres</th>
                        <td>
                            @foreach($book->genres as $genre)
                                <span class="badge bg-secondary me-1">{{ $genre->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h2 class="my-4">Reviews</h2>
        <div class="table-responsive mb-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Review ID</th>
                        <th style="width: 40%">Content</th>
                        <th>Rating</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($book->reviews as $review)
                    <tr>
                        <td>{{ $review->id }}</td>
                        <td><div style="max-width: 400px; overflow-wrap: break-word;">{{ $review->content }}</div></td>
                        <td>
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $review->rating)
                                    <i class="bi bi-star-fill text-warning"></i>
                                @else
                                    <i class="bi bi-star text-warning"></i>
                                @endif
                            @endfor
                            ({{ $review->rating }}/5)
                        </td>
                        <td>
                            <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('reviews.destroy', $review->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this review?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title mb-0">Add a Review</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('reviews.store') }}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" id="content" class="form-control" rows="4" style="max-width: 600px;" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" style="max-width: 100px;" required>
                        <div class="form-text">Rate from 1 to 5 stars</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Review</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </form>
            </div>
        </div>
@endsection
