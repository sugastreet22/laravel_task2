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

Route::group(['prefix' => 'stock', 'middleware' => 'auth'], function(){
    Route::get('index', 'StockController@index')->name('stock.index');
    Route::get('create', 'StockController@create')->name('stock.create');
    Route::post('register', 'StockController@register')->name('stock.register');
    Route::get('show/{id}', 'StockController@show')->name('stock.show');


});

Route::group(['prefix' => 'order', 'middleware' => 'auth'], function(){
    Route::get('index', 'OrderController@index')->name('order.index');
    Route::get('create', 'OrderController@create')->name('order.create');
    Route::post('register', 'OrderController@register')->name('order.register');


});
// Route::resource('stocks', 'StockController')->only([
//     'index', 'show'
// ]);



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
