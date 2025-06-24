@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit a Book</h1>
        <a href="{{ route('books.index') }}" class="btn btn-secondary mb-3">Go back to list</a>
        <form action="{{ route('books.update', $book->id) }}" method="post" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="id" class="form-label">Book ID</label>
                <input type="number" id="id" class="form-control" value="{{ $book->id }}" disabled>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" required>
            </div>
            <div class="mb-3">
                <label for="author_id" class="form-label">Author</label>
                <select name="author_id" id="author_id" class="form-select" required>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" @if($book->author_id == $author->id) selected @endif>{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="genres" class="form-label">Genres</label>
                <select name="genres[]" id="genres" class="form-select" multiple size="5" required>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ $book->genres->contains($genre->id) ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
                <div class="form-text">Hold Ctrl (Windows) or Command (Mac) to select multiple genres</div>
            </div>
            @if(isset($error))
                <div class="text-danger">{{ $message }}</div>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
@endsection
