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

Route::get('/ok', function () {
    return view('frontend.blank');
});
Route::get('/', 'FrontendController@index');
Route::get('/show', 'FrontendController@show');

Route::get('/create', function () {
    return view('backend.post.create');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){

Route::resource('/post','backend\PostController');
Route::resource('/catecory','backend\CategoryController');
Route::resource('/tag','backend\TagController');
Route::resource('/user','backend\UserController');


});
