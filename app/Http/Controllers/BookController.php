<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with(['author', 'genres'])->paginate(10);
        return view('book.index', ['books'=> $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('book.create', compact('authors', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'title' => 'required',
            'author_id' => 'required|exists:authors,id',
        ]);
        $book = Book::create($valid);
        if ($request->has('genres')) {
            $book->genres()->sync($request->input('genres'));
        }
        return redirect()->route('books.index')->with('success', 'Book Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::with('author', 'genres', 'reviews')->findOrFail($id);
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::with('genres')->findOrFail($id);
        $authors = Author::all();
        $genres = Genre::all();
        return view('book.edit', compact('book', 'authors', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'title' => 'required',
            'author_id' => 'required|exists:authors,id',
        ]);
        $book = Book::findOrFail($id);
        $book->update($valid);
        if ($request->has('genres')) {
            $book->genres()->sync($request->input('genres'));
        } else {
            $book->genres()->sync([]);
        }
        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
