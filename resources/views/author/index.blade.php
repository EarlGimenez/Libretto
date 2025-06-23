@extends('layouts.app')

@section('content')
    <div>
        <table>
            <tr>
                <th>Author ID</th>
                <th>Author Name</th>
            </tr>
            @foreach($authors as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->name }}</td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection