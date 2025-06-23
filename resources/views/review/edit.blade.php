@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit a Review</h1>
        <a href="{{ route('reviews.index') }}" class="btn btn-secondary mb-3">Go back to list</a>
        <form action="{{ route('reviews.update', $review->id) }}" method="post" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <input type="text" name="content" id="content" class="form-control" value="{{ $review->content }}" required>
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input type="number" name="rating" id="rating" class="form-control" value="{{ $review->rating }}" required>
            </div>
            @if(isset($error))
                <div class="text-danger">{{ $message }}</div>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
@endsection
