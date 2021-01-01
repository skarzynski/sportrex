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
})->name('welcome');

Route::get('/cart/{order}', [OrderController::class, 'showCart'])->name('Order.cart');
Route::post('/cart/{order}', [OrderController::class, 'recalculateCart']);

Route::get('/delivery/{order}', [DeliveryController::class, 'showDeliveries'])->name('Order.deliveries');

Route::get('/deliveryKurier/{order}', [DeliveryController::class, 'showKurierForm']);
Route::get('/deliveryPoczta/{order}', [DeliveryController::class, 'showPocztaForm']);
Route::get('/deliveryPaczkomat/{order}', [DeliveryController::class, 'showPaczkomatForm']);
Route::post('/deliveryKurier/{order}', [DeliveryController::class, 'doneKurierForm']);
Route::post('/deliveryPoczta/{order}', [DeliveryController::class, 'donePocztaForm']);
Route::post('/deliveryPaczkomat/{order}', [DeliveryController::class, 'donePaczkomatForm']);


Route::get('/orderDetails/{order}', [OrderController::class, 'orderDetails'])->name('Order.details');

Route::get('/myOrders', function () {
    return view('myOrders');
});
Route::get('/checkOrder',  [OrderController::class, 'showCheckOrder']);
Route::post('/checkOrder',  [OrderController::class, 'checkOrder']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
