@extends('layouts.app')

@section('content')
    <h1>Genres</h1>
    <button>
        <a href="{{ route('genres.create') }}">Create a New Genre</a>
    </button>
    @session('success')
        {{ $value }}
    @endsession
    <div>
        <table>
            <tr>
                <th>Genre ID</th>
                <th>Genre Name</th>
            </tr>
            @foreach($genres as $genre)
            <tr>
                <td>{{ $genre->id }}</td>
                <td>{{ $genre->name }}</td>
                <td>
                    <form action="{{ route('genres.destroy', $genre->id) }} " method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('genres.show', $genre->id) }}">show</a>
                        <a href="{{ route('genres.edit', $genre->id) }}">edit</a>
                        <button type="submit" onclick="return confirm('Do you want to delete this product?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            
        </table>
    </div>
    {{ $genres->links() }}
@endsection