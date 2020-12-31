<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DeliveryController;
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

Route::get('/cart/{order}', [OrderController::class, 'showCart'])->name('Order.cart');
Route::post('/cart/{order}', [OrderController::class, 'recalculateCart']);

Route::get('/delivery/{order}', [DeliveryController::class, 'showDeliveries'])->name('Order.deliveries');


Route::get('/deliveryPaczkomat/{id}', function () {
    return view('Orders.deliveryPaczkomat');
});

Route::get('/deliveryKurier/{id}', function () {
    return view('Orders.deliveryKurier');
});

Route::get('/deliveryPoczta/{id}', function () {
    return view('Orders.deliveryPoczta');
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
