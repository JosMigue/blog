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

Route::resource('users','UserController')->except('show');
/* Route::middleware(['auth:sanctum', 'verified'])->get('/posts', 'PostController@index')->name('posts'); */
/* Route::middleware(['auth:sanctum', 'verified'])->get('posts/create', function(){
    return view('posts.create');
})->name('create'); */

Route::middleware(['auth:sanctum', 'verified'])->get('/myposts', 'PostController@mypost')->name('myposts');




Route::resource('posts', 'PostController');


