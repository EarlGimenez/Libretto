@extends('layouts.app')

@section('content')
    <h1>Show Genre</h1>
    <a href="{{ route('genres.index') }}">Go back to list</a>
    <h3>Genre ID:</h3>{{ $genre->id }}<br>
    <h3>Genre Name:</h3>{{ $genre->name }}
@endsection