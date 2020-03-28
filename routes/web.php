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
    return view('front.home');
});

Route::get('/purchase-information', function () {
    return view('front.purchase_information');
});

Route::get('/welcome', function () {
    return view('front.welcome');
});

Route::get('/signup', function () {
    return view('front.signup'); 
});


