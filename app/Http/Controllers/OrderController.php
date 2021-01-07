<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

    function createOrder() {
        $price = 0;
        $orderDate = now();
        $orderStatus = 1;
        $user = null;

        if (Auth::user()) {
            $user = auth()->user()->id;
        }

        $orderID = DB::table('orders')
            ->insertGetId([
                'price' => $price,
                'order_date' => $orderDate,
                'user_id' => $user,
                'orderStatus_id' => $orderStatus
            ]);

        Session::put('orderID', $orderID);
    }

    function addProduct(Product $product) {
        if ($product->amount < 1) {
            return redirect(route('welcome'));
        }
        if (!Session::has('orderID')) {
            $this->createOrder();
        }
        if (DB::table('order_product')
            ->where('order_id', Session::get('orderID'))
            ->where('product_id', $product->id)
            ->doesntExist()) {
            DB::table('order_product')->insert([
                'order_id' => Session::get('orderID'),
                'product_id' => $product->id,
                'amount_of_product' => 0
            ]);
        }

        $amount = DB::table('order_product')
            ->where('order_id', Session::get('orderID'))
            ->where('product_id', $product->id)
            ->value('amount_of_product');

        DB::table('order_product')
            ->where('order_id', Session::get('orderID'))
            ->where('product_id', $product->id)
            ->update(['amount_of_product' => ++$amount]);

        $product->removeAmount();

        echo ("<script> alert('Dodano do koszyka') </script>");
        return redirect(route('welcome'));
    }

}
