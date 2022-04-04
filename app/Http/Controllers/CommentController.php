<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book; 
use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CommentController extends Controller
{

    //Crud ops for comment
    public function createComment($book_id, Request $request)
    {
        $book = Book::find($book_id);
        $comment = Comment::create([
            'comment' => $request->comment,
            'book_id' => $book->id
        ]);
        return response()->json($comment, 201);
    }

    //Find Comments
    public function showAllComments()
    {
        $comments = Comment::all();
        return response()->json($comments, 200);
    }

    //Find Comments
    public function showABookComments($book_id)
    {
        $comments = Comment::where('book_id', '=', $book_id)->get();
        return response()->json($comments, 200);
    }

    //Find Comments
    public function countABookComments($book_id)
    {
        $comments = Comment::where('book_id', '=', $book_id)->count();
        return response()->json($comments, 200);
    }
}
