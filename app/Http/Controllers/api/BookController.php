<?php

namespace App\Http\Controllers\api;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Book::with('author', 'genres')->get();
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

        return response()->json([
            'message' => 'Book successfully created',
            'book' => $book
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book = Book::with('author', 'genres')->find($book->id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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

        return response()->json([
            'message' => 'Book updated successfully',
            'book' => $book
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
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