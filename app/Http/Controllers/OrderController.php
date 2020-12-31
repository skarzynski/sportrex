<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    function showCart(Order $order) {
        $products = $order->products;
        return view('Orders.cart', [
            'products' => $products
        ]);
    }
}
