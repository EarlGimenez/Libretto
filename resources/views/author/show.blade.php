@extends('layouts.app')

@section('content')
    <h1>Show Author</h1>
    <a href="{{ route('authors.index') }}">Go back to list</a>
    <h3>Author ID:</h3>{{ $author->id }}<br>
    <h3>Author Name:</h3>{{ $author->name }}
@endsection
