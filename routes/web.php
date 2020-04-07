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
Route::get('/', 'PagesController@home');

Route::post('/welcome', 'PagesController@welcome');
  
Route::post('/purchase-info','PagesController@purchase_info');
 
Route::get('/purchase-information', function () {
    return view('front.purchase_information');
});

Route::get('/purchase-information-2', function () {
    return view('front.purchase_information_v2');
});

