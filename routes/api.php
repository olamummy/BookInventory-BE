<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('login', [AuthorController::class, 'login']);
$router->get('/', function () use ($router) {
    return $router->app->version();
});

// $router->group(['prefix' => 'api'], function () use ($router) {
//Find Authors
$router->get('authors',  ['uses' => 'AuthorController@showAllAuthors']);
$router->get('authors/{id}', ['uses' => 'AuthorController@showOneAuthor']);


//CRUD Authors
$router->put('authors/{id}', ['uses' => 'AuthorController@update']);
$router->post('authors', ['uses' => 'AuthorController@create']);
$router->delete('authors/{id}', ['uses' => 'AuthorController@delete']);

//Find books
$router->get('/books', ['uses' => 'BookController@showAllBooks']);
$router->get('/authors/{author_id}/books', ['uses' => 'BookController@showAllBooksFromAuthor']);
$router->get('/authors/{author_id}/books/{book_id}', ['uses' => 'BookController@showOneBook']);
$router->get('/books/{id}', ['uses' => 'BookController@showABook']);

//CRUD Books
$router->put('/books/{id}', ['uses' => 'BookController@updateBook']);
$router->post('/books', ['uses' => 'BookController@createBook']);
$router->delete('/authors/{author_id}/books/{book_id}', ['uses' => 'BookController@deleteBook']);

//Find Comments
$router->get('comments',  ['uses' => 'CommentController@showAllComments']);
$router->get('/books/{book_id}/comments', ['uses' => 'CommentController@showABookComments']);
$router->get('/books/{book_id}/comments/{comment_id}', ['uses' => 'CommentController@showAllCommentsFromBook']);
$router->get('/books/{book_id}/count', ['uses' => 'CommentController@countABookComments']);

// //CRUD Comments;
$router->post('/books/{book_id}/comments', ['uses' => 'CommentController@createComment']);

//// });