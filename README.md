# BookInventory-BE

### Used Versions
- Laravel Framework 9.5.1
- Laravel Passport v7.4.1
- Laravel Permission v3.0

### Download
```
git clone https://github.com/olamummy/BookInventory-BE.git
```

### To Use
- create .env file
- create database
- composer install
- php artisan key:generate
- npm install
- npm run dev
- php artisan migrate:refresh
- php artisan passport:install
- php artisan db:seed

### Route List
- GET|HEAD  api/authors ............................................................................................................... AuthorController@showAllAuthors 
- POST      api/authors ....................................................................................................................... AuthorController@create 
- GET|HEAD  api/authors/{author_id}/books ....................................................................................... BookController@showAllBooksFromAuthor
- GET|HEAD  api/authors/{author_id}/books/{book_id} ........................................................................................ BookController@showOneBook
- DELETE    api/authors/{author_id}/books/{book_id} ......................................................................................... BookController@deleteBook  - GET|HEAD  api/authors/{id} ........................................................................................................... AuthorController@showOneAuthor
- PUT       api/authors/{id} .................................................................................................................. AuthorController@update  - DELETE    api/authors/{id} .................................................................................................................. AuthorController@delete  - GET|HEAD  api/books ..................................................................................................................... BookController@showAllBooks
- POST      api/books ....................................................................................................................... BookController@createBook  - GET|HEAD  api/books/{book_id}/comments .......................................................................................... CommentController@showABookComments  - POST      api/books/{book_id}/comments .............................................................................................. CommentController@createComment
- GET|HEAD  api/books/{book_id}/comments/{comment_id} ....................................................................... CommentController@showAllCommentsFromBook  - GET|HEAD  api/books/{book_id}/count ............................................................................................ CommentController@countABookComments  - GET|HEAD  api/books/{id} ................................................................................................................... BookController@showABook
- PUT       api/books/{id} .................................................................................................................. BookController@updateBook  - GET|HEAD  api/comments ............................................................................................................ CommentController@showAllComments  - GET|HEAD  api/documentation ......................................................................... l5-swagger.default.api › L5Swagger\Http › SwaggerController@api
- GET|HEAD  api/oauth2-callback ................................................ l5-swagger.default.oauth2_callback › L5Swagger\Http › SwaggerController@oauth2Callback 

### Dashboard Url

https://snstech.com.ng/bookinventoryUI/#/

### Author Page Url

https://snstech.com.ng/bookinventoryUI/#/author

### Book Page Url

https://snstech.com.ng/bookinventoryUI/#/book
