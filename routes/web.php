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
// Route::get('/', function () {
//     return view('home.index');
// })->name('home.index');


// Route::get('/contact', function () {
//     return view('home.contact');
// })->name('home.contact');


// Simple View Rendering Routes - simplify routes as much as possible
Route::view('/', 'home.index')->name('home.index') ;
Route::view('/contact', 'home.contact')->name('home.contact');

//route parameter
Route::get('/blog/{id}', function ($id) {
    $posts = [
        1 => [
            'title' => 'Intro to Laravel',
            'content' => 'This is a short intro to Laravel',
            'is_new' => true
        ],
        2 => [
            'title' => 'Intro to PHP',
            'content' => 'This is a short intro to PHP',
            'is_new' => false
        ],
        3 => [
            'title' => 'Intro to the mover',
            'content' => 'This is a short intro to Mover.php',
            'is_new' => true
        ]
    ];

    abort_if(!isset($posts[$id]),404);

    return view('blogs.index',['post' => $posts[$id] ]);
})->name('blogs.index');

//optional parameter
Route::get('/posts/{id?}', function ($id = 20) {
    return 'Post'. $id;
})->name('post.show');


$posts = [
    1 => [
      'title' => 'Intro to Laravel',
      'content' => 'This is a short intro to Laravel',
      'is_new' => true,
      'has_comments' => true
    ],
    2 => [
      'title' => 'Intro to PHP',
      'content' => 'This is a short intro to PHP',
      'is_new' => false
    ]
  ];
  
  Route::get('/list', function () use ($posts) {
    // compact($posts) === ['posts' => $posts])
    return view('list.index', ['posts' => $posts]);
  });

// More info on Functions - https://www.youtube.com/watch?v=RIPJEgOrVRc&ab_channel=DaniKrossing
// You can also use regular expressions to limit what routes users can access


