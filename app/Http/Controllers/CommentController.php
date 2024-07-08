<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "product_id" => "required|integer",
            "text" => "required|string|max:225"
        ]);

        $currentUser = Auth::user();

        if (Auth::check() && $currentUser) {
            $product = Product::findOrFail( (int) $formFields["product_id"]);
            if ($product) {
                Comment::create([
                    "user_id" => $currentUser->id,
                    "product_id" => $product->id,
                    "text" => $formFields["text"]
                ]);
                return response()->json([
                    'message' => 'comment created ',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'product not found',
                ], 403);
            }
        } else {
            return response()->json([
                'message' => 'user not found',
            ], 403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $formFields = $request->validate([
            "text" => "required|string|max:225",
        ]);

        // Authenticate the user
        $currentUser = Auth::user();

        if (Auth::check() && $currentUser) {
            // Find the comment by its ID
            $comment = Comment::findOrFail($id);

            // Check if the current user is the owner of the comment
            if ($comment->user_id == $currentUser->id || $currentUser->is_admin) {
                // Update the comment's text
                $comment->text = $formFields["text"];
                $comment->save();

                return response()->json([
                    'message' => 'Comment updated',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Unauthorized',
                ], 403);
            }
        } else {
            return response()->json([
                'message' => 'User not found',
            ], 403);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $currentUser = Auth::user();

        if (Auth::check() && $currentUser) {
            // Find the comment by its ID
            $comment = Comment::findOrFail($id);

            // Check if the current user is the owner of the comment
            if ($comment->user_id == $currentUser->id || $currentUser->is_admin) {
                $comment->delete();
                return response()->json([
                    'message' => 'Comment deleted',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Unauthorized',
                ], 403);
            }
        } else {
            return response()->json([
                'message' => 'User not found',
            ], 403);
        }
    }
}
