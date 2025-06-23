@extends('layouts.app')

@section('content')
    <div>
        <table>
            <tr>
                <th>Book ID</th>
                <th>Book Title</th>
                <th>Book Author</th>
            </tr>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author->name }}</td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection