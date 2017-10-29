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
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shop/add', 'LocationController@index')->name('add_shop');