@extends('layouts.app')

@section('content')
    <div>
        <table>
            <tr>
                <th>Book ID</th>
                <th>Book Name</th>
            </tr>
            @foreach($genres as $genre)
            <tr>
                <td>{{ $genre->id }}</td>
                <td>{{ $genre->name }}</td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection