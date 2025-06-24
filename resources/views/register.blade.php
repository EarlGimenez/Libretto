@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1> Register </h1>
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password">
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password2" class="col-sm-2 col-form-label">Confirm Password:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password2" name="password2">
                @error('password2') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-warning">Clear Form</button>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <a href="{{ route('login') }}">Already have an account? Login</a>
            </div>
        </div>
    </form>
</div>
@endsection
