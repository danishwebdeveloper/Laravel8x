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

Route::get('/contact', function(){
    return "Aya haya contact aaa";
})->name('Contact.index');

// pass parameter
Route::get('/posts/{id}', function($id){
    return "Blog Post Num:" . $id;
})->name('posts.show');

// Optional Parameter
Route::get('/recent-posts/{id?}', function($daysAgo = 20){
    return "Posts From " . $daysAgo . " Days Ago";
})->name('post.recent.index');