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

Route::post('/purchase-info-v2','PagesController@purchase_infov2');

//Route::post('/execute-order','PagesController@execute_order');
Route::post('/payment','PagesController@payment');

Route::get('/purchase-information-ori', function () {
    return view('front.purchase_information_ori');
});

Route::get('/purchase-information-2', function () {
    return view('front.purchase_information_v2_ori');
});
Route::get('/payment-ori', function () {
    return view('front.payment_succeed_ori');
});


// EMAIL ROUTES
//Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
//Route::get('sendattachmentemail','MailController@attachment_email');
