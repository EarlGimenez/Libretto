<?php

namespace App\Http\Controllers\api;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Review::with('book')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'content' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review = Review::create($request->all());
        
        return response()->json([
            'message' => 'Review successfully created',
            'review' => $review
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return Review::with('book')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $valid = $request->validate([
            'book_id' => 'required|exists:books,id',
            'content' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        $review = Review::findOrFail($review->id);
        $review->update($valid);

        return response()->json([
            'message' => 'Review successfully updated',
            'review' => $review
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
        $review->delete();
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