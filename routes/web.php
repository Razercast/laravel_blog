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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['prefix'=>'admin','namespace'=>'admin'],function(){
   Route::get('/','MainController@index')->name('admin.index');
   Route::resource('/categories','CategoryController');
   Route::resource('/tags','TagController');
});
