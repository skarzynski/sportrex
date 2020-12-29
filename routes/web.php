<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/delivery/{id}', function () {
    return view('delivery');
});

Route::get('/deliveryBox/{id}', function () {
    return view('deliveryBox');
});

Route::get('/deliveryCourier/{id}', function () {
    return view('deliveryCourier');
});

Route::get('/deliveryPost/{id}', function () {
    return view('deliveryPost');
});

Route::get('/orderDetails/{id}', function () {
    return view('orderDetails');
});

Route::get('/myOrders', function () {
    return view('myOrders');
});
Route::get('/checkOrder', function () {
    return view('checkOrder');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
