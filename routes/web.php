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
Route::get('/', function () {
    return view('home.index', []);
})->name('home.index');

Route::get('/contact', function(){
    return view('home.contact');
})->name('Contact.index');

// pass parameter
Route::get('/posts/{id}', function($id){
    return "Blog Post Num:" . $id;
})
// ->where([
//     'id'=> '[0-9]+'
// ])
->name('posts.show');

// Optional Parameter
Route::get('/recent-posts/{id?}', function($daysAgo = 20){
    return "Posts From " . $daysAgo . " Days Ago";
})->name('post.recent.index');