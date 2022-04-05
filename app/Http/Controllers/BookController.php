<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book; 
use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController extends Controller
{

    /**
     * @OA\Get(
     *     path="/showAllBooks",
     *     @OA\Response(response="200", description="show All Books.")
     * )
    */

    //show all books
    public function showAllBooks()
    {
        $books = Book::orderByDesc('id')->get();
        return response()->json($books, 200);
    }

    /**
     * @OA\Get(
     *     path="/showAllBooksFromAuthor",
     *     @OA\Response(response="200", description="show All Books From Author.")
     * )
    */

    // show All Books From an Author
    public function showAllBooksFromAuthor($author_id)
    {
        $author = Author::find($author_id);
        $books = $author->books;
        return response()->json($books, 200);
    }
    
    /**
     * @OA\Get(
     *     path="/showOneBook",
     *     @OA\Response(response="200", description="show One Book from author.")
     * )
    */
    
    //show One Book
    public function showOneBook($author_id, $book_id)
    {
        $author = Author::find($author_id);
        $book = $author->books
                       ->where('id', '=', $book_id)
                       ->first();
        return response()->json($book, 200);
    }

    /**
     * @OA\Get(
     *     path="/showABook",
     *     @OA\Response(response="200", description="show a Book.")
     * )
    */

    //show A Book
    public function showABook($id)
    {
        return response()->json(Book::find($id));
    }

    /**
     * @OA\Post(
     *     path="/createBook",
     *     @OA\Response(response="200", description="create Book.")
     * )
    */
    //
    // CRUD Books
    public function createBook(Request $request)
    {
        $author = Author::find($request->author_id);
        $book = Book::create([
            'title' => $request->title,
            'author_id' => $author->id
        ]);
        return response()->json($book, 201);
    }

    /**
     * @OA\Put(
     *     path="/updateBook",
     *     @OA\Response(response="200", description="update Book.")
     * )
    */
    // updateBook
    public function updateBook($book_id, Request $request)
    {
        $author = Author::find($request->author_id);
        $book = Book::where('id', '=', $book_id)->update([ 'title' => $request->title,
        'author_id' => $request->author_id]);
                       
        return response()->json($book, 200);
    }

    /**
     * @OA\Delete(
     *     path="/deleteBook",
     *     @OA\Response(response="200", description="delete Book.")
     * )
    */
    // delete book
    public function deleteBook($author_id, $book_id)
    {
        $author = Author::find($author_id);
        $book = $author->books
                       ->where('id', '=', $book_id)
                       ->first()
                       ->delete();
        return response('Book Deleted Successfully', 200);
    }
}
