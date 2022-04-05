<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book; 
use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CommentController extends Controller
{

    //show all Comments
    public function showAllComments()
    {
        $comments = Comment::orderByDesc('id')->get();
        return response()->json($comments, 200);
    }

    //Find Comments
    public function showABookComments($book_id)
    {
        $comments = Comment::where('book_id', '=', $book_id)->orderBy('id', 'DESC')->get();
        return response()->json($comments, 200);
    }

    //Crud comment
    public function createComment($book_id, Request $request)
    {
        if (strlen($request->comment) > 501) {
            return response()->json("Please post a valid comment", 500);
        }

        $book = Book::find($book_id);
        $comment = Comment::create([
            'comment' => $request->comment,
            'book_id' => $book->id,
            'ip' => $_SERVER['REMOTE_ADDR']
        ]);
        return response()->json($comment, 201);
    }

    //Count Comments by book id
    public function countABookComments($book_id)
    {
        $comments = Comment::where('book_id', '=', $book_id)->count();
        return response()->json($comments, 200);
    }
}
