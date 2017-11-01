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

Route::get('/', function () {
    return view('welcome');
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
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'shop'], function () {
    Route::get('add', 'LocationController@create')->name('add_shop');
    Route::post('add', 'LocationController@store');
});

Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contact', 'HomeController@postContact');