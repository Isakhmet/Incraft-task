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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1/books')->group(function (){
    Route::get('list', 'BooksController@list');
    Route::get('{id}', 'BooksController@bookById');
    Route::post('create', 'BooksController@create');
    Route::post('update', 'BooksController@update');
    Route::delete('{id}', 'BooksController@delete');
});
