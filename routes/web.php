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

Route::post('/purchase-info', 'PagesController@purchase_info');

Route::post('/purchase-info-v2', 'PagesController@purchase_infov2');

Route::post('/try_payment', 'PagesController@try_payment');

Route::post('/payment_done', 'PagesController@payment_done');

//Route::post('/webhook', 'PagesController@webhook_controller');

//webhook
Route::post('/webhook_controller', 'WebhookController@webhook_controller');


 
/**
 * ORIS PARA BORRAR DESPUES
 */
Route::get('/purchase-information-ori', function () {
    return view('front.purchase_information_ori');
});

Route::get('/purchase-information-2', function () {
    return view('front.purchase_information_v2_ori');
});
Route::get('/payment-ori', function () {
    return view('front.payment_succeed_ori');
});

Route::get('/oxxomail', function () {
    return view('mails.payment_succeed_oxxo');
});

/**
 * EMAILS DE PRUEBA
 */
Route::get('sendhtmlemail', 'MailController@html_email');
