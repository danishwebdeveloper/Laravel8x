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

// Inside the home folder
// Route::get('/', function () {
//     return view('home.index', []);
// })->name('home.index');

// Route::get('/contact', function(){
//     return view('home.contact');
// })->name('Contact.index');


// New method o make routing if no need to return any object from here
Route::view('/', 'home.index')->name('home.index');
Route::view('/contact', 'home.contact')->name('contact.index');

// Now Global declaration and use it using use($posts)
$posts = [
    1 => [
        'title' => 'Intro to Laravel',
        'content' => 'This is a short intro to Laravel',
        'is_new' => true,
        'has_comment' => true
    ],
    2 => [
        'title' => 'Intro to PHP',
        'content' => 'This is a short intro to PHP',
        'is_new' => false,
       
    ],
    3 => [
        'title' => 'Intro to GoLang',
        'content' => 'This is a short intro to Golang',
        'is_new' => false,
       
    ]
];

Route::get('/posts', function() use($posts){
    return view('Posts.index', ['posts'=> $posts]);
});

// pass parameter
Route::get('/posts/{id}', function($id) use($posts){
    // If not exist get 404 not poage found error
    abort_if(!isset($posts[$id]), 404);

    // Here 'post' store value and we use it Posts.show section and give them a value etc
    return view('Posts.show', ['post'=> $posts[$id]]);
})
// ->where([
//     'id'=> '[0-9]+'
// ])
->name('posts.show');


// HTTP Response, Dummy Response
Route::get('/fun/response', function() use($posts){
    return response($posts, 201)
    ->header('Content-Type', 'application/json')
    ->cookie('MY_COOKIE', 'Muhammad Danish', 3600);
});

// Grouping Routes
Route::prefix('/fun')->name('fun.')->group(function() use($posts){
    // Multiple ways of Redirect Routes
Route::get('/redirect', function() use($posts){
    return redirect('/contact');
})->name('redirect.index');

Route::get('/back', function() use($posts){
    return back();
})->name('back.index');

Route::get('/route-name', function() use($posts){
    return redirect()->route('posts.show', ['id' => 1]);
})->name('route-name');

Route::get('/away', function() use($posts){
    return redirect()->away('https://google.com');
})->name('away.index');

// Json reponse
Route::get('/json', function() use($posts){
    return response()->json($posts);
})->name('away.index');

// Returning Downlaod File
Route::get('/download', function(){
    return response()->download(public_path('/dd.jpg', 'face.jpg'));
})->name('downlaod.index');
});


// Optional Parameter
Route::get('/recent-posts/{id?}', function($daysAgo = 20){
    return "Posts From " . $daysAgo . " Days Ago";
})->name('post.recent.index');