<?php

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


use Illuminate\Support\Facades\Route;

Route::get('/', 'PostController@index')->name('home');
Route::get('/article/{slug}', 'PostController@show')->name('posts.single');
Route::get('/category/{slug}', 'CategoryController@show')->name('categories.single');

Route::group(['prefix'=>'admin','namespace'=>'admin','middleware'=>'admin'],function(){
   Route::get('/','MainController@index')->name('admin.index');
   Route::resource('/categories','CategoryController');
   Route::resource('/tags','TagController');
   Route::resource('/posts','PostController');
});

Route::group(['middleware'=>'guest'],function(){
    Route::get('/register','UserController@create')->name('register.create');
    Route::post('/register','UserController@store')->name('register.store');
    Route::get('/login','UserController@loginForm')->name('login.create');
    Route::post('/login','UserController@login')->name('login.store');
});

Route::get('/logout','UserController@logout')->name('logout')->middleware('auth');
