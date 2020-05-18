<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'BookController@welcome')->name('/');
Route::post('/addbook', 'BookController@addbook')->name('addbook');
Route::get('book/{id}', 'BookController@getbook')->name('book');
Route::get('books/{id}', 'BookController@getbooks')->name('books');
Route::get('authors/{id}', 'BookController@getauthors')->name('authors');
