<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Author::with('books')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $post = Author::create([
            'name' => $request->name,
        ]);

        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return Author::with('books')->find($author->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author->update($request->only( 'name'));

        return response()->json($author);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
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