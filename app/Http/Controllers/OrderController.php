<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    function showCart(Order $order) {
        $products = $order->products;
        $amount = 0;
        foreach ($products as $product):
            $product['amount_in_order'] = $order->AmountOfProduct($product);
            $amount++;
        endforeach;

        return view('Orders.cart', [
            'products' => $products,
            'amount' => $amount,
            'order' => $order
        ]);
    }

    function recalculateCart(Order $order){
        $products = $order->products;
        foreach ($products as $product):
            $amount = \request('quantity'.$product->id);
            if ($amount < 1){
                DB::table('order_product')
                    ->where('order_id', '=', $order->id)
                    ->where('product_id', '=', $product->id)
                    ->delete();
            }else{
                DB::table('order_product')
                    ->where('order_id', '=', $order->id)
                    ->where('product_id', '=', $product->id)
                    ->update(['amount_of_product' => $amount]);
            }

        endforeach;
        return redirect(route('Order.cart',$order->id));
    }

    function showCheckOrder(){
        return view('Orders.checkOrder');
    }

    function checkOrder(){
            $id = \request('id');
            $email = \request('email');
            DB::table('orders')
                    ->where('id', '=', $id)
                    ->where('email', '=', $email)
                    ->get();


        return redirect(route('Order.details',$id ));
    }

    function orderDetails(Order $order){
        $products = $order->products;
        $orderStatus = DB::table('orderstatus')
            ->where('id', '=', $order->orderStatus_id)
            ->get();
        return view('Orders.orderDetails', [
            'products' => $products,
            'order' => $order,
            'orderStatus' => ($orderStatus[0])->name
        ]);
    }

}
