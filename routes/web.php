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
      'content' => 'A blog (a truncation of "weblog")[1] is a discussion or informational website published on the World Wide Web consisting of discrete, often informal diary-style text entries (posts). Posts are typically displayed in reverse chronological order, so that the most recent post appears first, at the top of the web page. Until 2009, blogs were usually the work of a single individual,[citation needed] occasionally of a small group, and often covered a single subject or topic. In the 2010s, "multi-author blogs" (MABs) emerged, featuring the writing of multiple authors and sometimes professionally edited. MABs from newspapers, other media outlets, universities, think tanks, advocacy groups, and similar institutions account for an increasing quantity of blog traffic. The rise of Twitter and other "microblogging" systems helps integrate MABs and single-author blogs into the news media. Blog can also be used as a verb, meaning to maintain or add content to a blog.',
      'is_new' => true,
      'has_comments' => true
    ],
    2 => [
      'title' => 'Intro to PHP',
      'content' => 'Many blogs provide commentary on a particular subject or topic, ranging from philosophy, religion, and arts to science, politics, and sports. Others function as more personal online diaries or online brand advertising of a particular individual or company. A typical blog combines text, digital images, and links to other blogs, web pages, and other media related to its topic. The ability of readers to leave publicly viewable comments, and interact with other commenters, is an important contribution to the popularity of many blogs. However, blog owners or authors often moderate and filter online comments to remove hate speech or other offensive conte',
      'is_new' => false
    ]
  ];
  
  Route::get('/list', function () use ($posts) {
    // compact($posts) === ['posts' => $posts])
    return view('list.index', ['posts' => $posts]);
  });

// More info on Functions - https://www.youtube.com/watch?v=RIPJEgOrVRc&ab_channel=DaniKrossing
// You can also use regular expressions to limit what routes users can access


  //optional parameter
  Route::get('/fun/responses', function () use($posts) {
    return response($posts, 201)->header('Content-Type', 'application/json')
    ->cookie('fancy cookie', 'Godwill Barasa', 3600);
  })->name('response.show');

  Route::get('/fun/redirect', function () {
      return redirect('/contact');
  });


  //nack
  Route::get('/fun/back', function () {
    return redirect('/contact');
});


//json
Route::get('/fun/json', function () use($posts) {
  return response()->json($posts);
});

//redirect away
Route::get('/fun/away', function () {
  return redirect()->away('https://www.google.com');
});

//download
Route::get('/fun/download', function() use($posts) {
  return response()->download(public_path('Godwill.jpeg'), 'face.jpg');
}); 

// error - Unable to guess the MIME type as no guessers are available (have you enabled the php_fileinfo extension?).