<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book; 
use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthorController extends Controller
{
    ////
    /**
     * @OA\Get(
     *     path="/api/showAllAuthors",
     *     @OA\Response(response="200", description="show a Book.")
     * )
    */
    public function showAllAuthors()
    {
        return response()->json(Author::orderByDesc('id')->get());
    }

    public function showOneAuthor($id)
    {
        return response()->json(Author::find($id));
    }

    //Create Author
    public function create(Request $request)
    {
        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    //Update Author
    public function update($id, Request $request)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    //Delete Author
    public function delete($id)
    {
        Author::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
    
}
