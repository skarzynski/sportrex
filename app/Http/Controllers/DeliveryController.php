<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    function showDeliveries(Order $order) {
        $products = $order->products;
        foreach ($products as $product):
            $product['amount_in_order'] = $order->AmountOfProduct($product);
        endforeach;

        $deliveries = DB::table('deliveries')
            ->get();

        return view('Orders.delivery', [
            'products' => $products,
            'order' => $order,
            'deliveries' => $deliveries
        ]);
    }
}
