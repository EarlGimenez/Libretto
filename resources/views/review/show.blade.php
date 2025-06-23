@extends('layouts.app')

@section('content')
    <h1>Show Review</h1>
    <a href="{{ route('reviews.index') }}">Go back to list</a>
    <h3>Review ID:</h3>{{ $review->id }}<br>
    <h3>Content:</h3>{{ $review->content }}<br>
    <h3>Rating:</h3>{{ $review->rating }}
@endsection
