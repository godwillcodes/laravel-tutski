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
    return view('welcome');
})->name('home.index');

Route::get('/contact', function () {
    return 'contact me broski';
})->name('home.contact');


Route::get('/blog/{id}', function ($id) {
    return 'Post'. $id;
})->name('blog.show');



Route::get('/posts/{id?}', function ($id = 20) {
    return 'Post'. $id;
})->name('post.show');



