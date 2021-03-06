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

Route::get('/', 'ProductController@index');

Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');
Route::resource('firms', 'FirmController');
Route::get('/product/sum/day', function(){
    return view('sum.day');
});
Route::get('/product/sum/month', function(){
    return view('sum.month');
});
Route::post('/product/sum/day', 'ProductController@daySum');
Route::post('/product/sum/month', 'ProductController@manyDaySum');
Route::post('/product/search', 'ProductController@searchProduct');



