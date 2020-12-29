<?php

use Illuminate\Support\Facades\Route;
Route::get('/', 'LandingPageController@index');
Route::get('/posts/show/{postName}', 'LandingPageController@show')->name('landing.show');
Route::get('/autors/{user}', 'LandingPageController@showAUthor')->name('landing.showAuthor');
Route::get('/login', function () { //Usar login controller para esta no callbacks
    return view('auth.login');
})->name('login');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard'); //usar un controlador para esta petición
})->name('dashboard');
Route::resource('users','UserController')->except('show');
Route::middleware(['auth:sanctum', 'verified'])->get('/myposts', 'PostController@mypost')->name('myposts');
Route::resource('posts', 'PostController');