@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit a Genre</h1>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary mb-3">Go back to list</a>
        <form action="{{ route('genres.update', $genre->id) }}" method="post" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $genre->name }}" required>
                @if(isset($error))
                    <div class="text-danger">{{ $message }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
@endsection