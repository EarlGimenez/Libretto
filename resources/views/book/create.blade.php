@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Create a New Book</h1>
        <a href="{{ route('books.index') }}" class="btn btn-secondary mb-3">Go back to list</a>
        <form action="{{ route('books.store') }}" method="post" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="author_id" class="form-label">Author</label>
                <select name="author_id" id="author_id" class="form-select" required>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Genres</label><br>
                @foreach($genres as $genre)
                    <div class="form-check">
                        <input type="checkbox" name="genres[]" value="{{ $genre->id }}" class="form-check-input" id="genre-{{ $genre->id }}">
                        <label class="form-check-label" for="genre-{{ $genre->id }}">{{ $genre->name }}</label>
                    </div>
                @endforeach
            </div>
            @if(isset($error))
                <div class="text-danger">{{ $message }}</div>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
@endsection
