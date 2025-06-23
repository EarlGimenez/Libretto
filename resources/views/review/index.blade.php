@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Reviews</h1>
        <a href="{{ route('reviews.create') }}" class="btn btn-primary mb-3">Create a New Review</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Review ID</th>
                        <th>Content</th>
                        <th>Rating</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->id }}</td>
                        <td>{{ $review->content }}</td>
                        <td>{{ $review->rating }}</td>
                        <td>
                            <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('reviews.destroy', $review->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this review?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $reviews->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
