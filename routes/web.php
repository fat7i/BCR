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

Auth::routes();

Route::group(['prefix' => '/'], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('home', 'HomeController@index')->name('home');
    Route::get('profile', 'HomeController@index');
    Route::get('contact', 'HomeController@contact')->name('contact');
    Route::post('contact', 'HomeController@postContact');
    Route::get('search', 'HomeController@search');
});



Route::group(['prefix' => 'product'], function () {
    Route::get('create/{barcode?}', 'ProductController@create')->where('id', '[0-9]+');
    Route::get('{id}', 'ProductController@show');
    Route::post('store', array('uses' => 'ProductController@store'));
    Route::post('upload', 'ProductController@upload');
    Route::get('{id}/add/price', 'ProductController@addPrice');
    Route::post('add/price', 'ProductController@postPrice');
    Route::post('add/comment', 'ProductController@postComment');
    Route::get('{id}/add/photo', 'ProductController@addPhoto');
    Route::post('add/photo', 'ProductController@postPhoto');
    Route::get('{id}/not_found', 'ProductController@notFound');
});

Route::group(['prefix' => 'shop'], function () {
    Route::get('add', 'LocationController@create')->name('add_shop');
    Route::post('add', 'LocationController@store');
    Route::get('{id}', 'LocationController@show');
});


Route::group(['prefix' => 'category'], function () {
    Route::get('/', 'CategoryController@index');
    Route::get('{id}', 'CategoryController@show');
});