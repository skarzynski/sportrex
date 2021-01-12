<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\PaymentController;

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

Route::get('/', [ProductController::class, 'index'])->name('welcome');

Route::get('/cart/{order}', [OrderController::class, 'showCart'])->name('Order.cart');
Route::post('/cart/{order}', [OrderController::class, 'recalculateCart']);

Route::get('/delivery/{order}', [DeliveryController::class, 'showDeliveries'])->name('Deliveries.deliveries');
Route::get('/deliveryKurier/{order}', [DeliveryController::class, 'showCourierForm']);
Route::get('/deliveryPoczta/{order}', [DeliveryController::class, 'showPostForm']);
Route::get('/deliveryPaczkomat/{order}', [DeliveryController::class, 'showParcelLockerForm']);
Route::post('/deliveryKurier/{order}', [DeliveryController::class, 'doneCourierForm']);
Route::post('/deliveryPoczta/{order}', [DeliveryController::class, 'donePostForm']);
Route::post('/deliveryPaczkomat/{order}', [DeliveryController::class, 'doneParcelLockerForm']);

Route::get('/paymentCard/{order}', [PaymentController::class, 'showCardForm'])->name('Payment.Card');
Route::post('/paymentCard/{order}', [PaymentController::class, 'doneCardForm']);

Route::get('/paymentTransfer/{order}', [PaymentController::class, 'showTransferForm'])->name('Payment.Transfer');
Route::post('/paymentTransfer/{order}', [PaymentController::class, 'doneTransferForm']);

Route::get('/order/{order}/complaint', [ComplaintController::class, 'create'])->middleware('auth');

Route::get('/complaint/create', [ComplaintController::class, 'create'])->name('complaint.create');
Route::post('/complaint', [ComplaintController::class, 'store'])->name('complaint.store');
Route::get('/complaint/orders', [OrderController::class, 'showClosedUserOrders'])->name('order.closed')->middleware('auth');

Route::post('/product/{product}/addToCart', [OrderController::class, 'addProduct']);


Route::get('/orderDetails/{order}', [OrderController::class, 'orderDetails'])->name('Order.details');

Route::get('/myOrders/{user}', [OrderController::class, 'myOrders'])->name('Order.myOrders');

Route::get('/checkOrder',  [OrderController::class, 'showCheckOrder'])->name('Order.check');
Route::post('/checkOrder',  [OrderController::class, 'checkOrder']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
