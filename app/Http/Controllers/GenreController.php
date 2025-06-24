<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
 
        return view('genre.index', [
            'genres'=> Genre::paginate(10),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'id' => 'required|unique:genres,id',
            'name'=>'required'
        ]);
        Genre::create($valid);
        return redirect()->route('genres.index')->with('success','Genre Succesfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genre = Genre::with(['books.author'])->findOrFail($id);
        return view('genre.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('genre.edit',  compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $valid = $request->validate([
            'name'=>'required'
        ]);
        $genre->update($valid);
        return redirect()->route('genres.index')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
