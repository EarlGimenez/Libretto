@extends('layouts.app')

@section('content')
    <h1>Edit a Genre</h1>
    <a href="{{ route('genres.index') }}">Go back to list</a>
    <form action="{{ route('genres.update', $genre->id) }}" method="post">
        @csrf
        @method('PUT')
        Name<input type="text" name="name" value="{{ $genre->name }}">
        @if(isset($error))
            {{ $message }}
        @endif
        <input type="submit">
        <input type="reset">
    </form>
@endsection