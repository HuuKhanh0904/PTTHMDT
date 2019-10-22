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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index',function(){
    return view('index');
});

Route::get('tour_index', 'TourController@index')->name('tours/tour_index');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/index_test',function(){
        return view('pages.test');
    });
});

Route::group(['prefix' => 'posts'], function () {
    Route::get('/add_post','PostController@create')->name('posts.add_posts');
});