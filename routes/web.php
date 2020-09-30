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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/posts', 'PostController@index')->name('posts');

Route::middleware(['auth:sanctum', 'verified'])->get('posts/create', function(){
    return view('posts.create');
})->name('create');



Route::resource('post', 'PostController');

Route::post('/add', 'PostController@store')->name('add');
Route::post('/update', 'PostController@update')->name('update');
Route::post('/delete', 'PostController@destroy')->name('delete');