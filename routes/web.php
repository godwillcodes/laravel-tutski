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


//remember to name your routes
Route::get('/', function () {
    return view('home.index');
})->name('home.index');


Route::get('/contact', function () {
    return 'contact me broski';
})->name('home.contact');

//route parameter
Route::get('/blog/{id}', function ($id) {
    return 'Post'. $id;
})->name('blog.show');

//optional parameter
Route::get('/posts/{id?}', function ($id = 20) {
    return 'Post'. $id;
})->name('post.show');


// More info on Functions - https://www.youtube.com/watch?v=RIPJEgOrVRc&ab_channel=DaniKrossing
// You can also use regular expressions to limit what routes users can access


