@extends('layouts.app')

@section('content')
    <h1>Create a New Genre</h1>
    <a href="{{ route('genres.index') }}">Go back to list</a>
    <form action="{{ route('genres.store') }}" method="post">
        @csrf
        Name<input type="text" name="name">
        @if(isset($error))
            {{ $message }}
        @endif
        <input type="submit">
        <input type="reset">
    </form>
@endsection