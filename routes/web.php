<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FacultiesController@index');

Route::get('/team', function () {
    return view('team');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/report', function () {
    return view('report');
});

Route::get('/help', function () {
    return view('help');
});

Route::get('/donate', function () {
    return view('donate');
});

Route::get('/suggestions', function () {
    return view('suggestions');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('books', 'BooksController');
Route::resource('categories', 'CategoriesController');
Route::resource('faculties', 'FacultiesController');
Route::resource('reviews', 'ReviewsController');
Route::resource('users', 'UsersController');

Route::get('/faculties/{id}', function($id) {
    $book = Book::where('faculty_id', $id)->first();

    return View::make('faculties')->with('book', $book);
});

Route::middleware(['auth'])->group(function () {
    
});