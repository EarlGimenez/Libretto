<?php

namespace App\Http\Controllers\api;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Genre::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=> "required|string|max:255",
        ]);

        $genre = Genre::create([
            "name"=> $request->name
        ]);

        return response()->json($genre, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return Genre::find($genre->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            "name"=> "required|string|max:255",
        ]);

       $genre->update([
            "name"=> $request->name
        ]);

        return response()->json($genre, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return response()->json(null, 204);
    }
}



// code snippet from previous activity
// public function index()
//     {
//         return Post::with('user', 'comments')->get();
//     }
//     public function store(Request $request)
//     {
//         $request->validate([
//             'title' => 'required|string|max:255',
//             'body' => 'required|string',
//         ]);
//         $post = Post::create([
//             'user_id' => auth()->id(),
//             'title' => $request->title,
//             'body' => $request->body,
//         ]);
//         return response()->json($post, 201);
//     }
//     public function show(Post $post)
//     {
//         return $post->load('user', 'comments');
//     }
//     public function update(Request $request, Post $post)
//     {
//         $this->authorize('update', $post);
//         $request->validate([
//             'title' => 'sometimes|string|max:255',
//             'body' => 'sometimes|string',
//         ]);
//         $post->update($request->only('title', 'body'));
//         return response()->json($post);
//     }
//     public function destroy(Post $post)
//     {
//         $this->authorize('delete', $post);
//         $post->delete();
//         return response()->json(null, 204);
//     }