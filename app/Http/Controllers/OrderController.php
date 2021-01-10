<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    function myOrders(User $user){

        if (Auth::check()) {
            $userID = auth()->user()->id;
            if ($user->id != $userID){
                Session::put('userFailure', 'Nie masz dostępu do tego konta');
                return redirect(route('welcome'));
            }
        }else{
            Session::put('userFailure', 'Nie masz dostępu do tego konta');
            return redirect(route('welcome'));
        }

        $orders = DB::table('orders')
            ->where('user_id', '=', $userID)
            ->get();

        return view('Orders.myOrders', [
            'orders' => $orders
        ]);
    }

    function showCart(int $orderId) {
        if ($orderId == -1){
            Session::put('cartFailure', 'Twój koszyk jest pusty, dodaj produkt aby móc zrealizować zamówienie');
            return redirect(route('welcome'));
        }
        $order = Order::where('id', '=', $orderId)->firstOrFail();

        if (Auth::check()) {
            $userID = auth()->user()->id;
            if ($order->user_id != $userID){
                Session::put('cartFailure', 'Nie masz dostępu do tego koszyka');
                return redirect(route('welcome'));
            }
        }

        $products = $order->products;
        $amount = 0;
        foreach ($products as $product):
            $product['amount_in_order'] = $order->AmountOfProduct($product);
            $amount++;
        endforeach;
        $order->calculatePriceAndSave();
        return view('Orders.cart', [
            'products' => $products,
            'amount' => $amount,
            'order' => $order
        ]);
    }

    function recalculateCart(Order $order){

        if (Auth::check()) {
            $userID = auth()->user()->id;
            if ($order->user_id != $userID){
                Session::put('cartFailure', 'Nie masz dostępu do tego koszyka');
                return redirect(route('welcome'));
            }
        }

        $products = $order->products;
        foreach ($products as $product):
            $amount = \request('quantity'.$product->id);

            $productInOrder = DB::table('order_product')
                ->where('order_id', '=', $order->id)
                ->where('product_id', '=', $product->id)
                ->get();

            $amountDiffrent =  ($productInOrder[0])->amount_of_product - $amount;
            $canUpdate = $product->updateAmountByNumber($amountDiffrent);
            if (!$canUpdate){
                Session::put('changeAmountFailure', 'Nie nie można zmienić ilości produktu');
                return redirect(route('Order.cart',$order->id));
            }

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

        $order->calculatePriceAndSave();
        Session::put('changeAmountSucces', 'Zmieniono ilość produktu');
        return redirect(route('Order.cart',$order->id));
    }

    function showCheckOrder(){
        return view('Orders.checkOrder');
    }

    function checkOrder(){
            $id = \request('id');
            $email = \request('email');

            $order = Order::where('id', $id)
                    ->where('email', $email)
                    ->first();

        if ($order != null){
            return $this->orderDetails($order);
        }else{
            Session::put('checkOrderFailure', 'Takie zamówienie nie istnieje lub nieprawidłowy email');
            return view('Orders.checkOrder');
        }
    }

    function orderDetails(Order $order){
        $products = $order->products;
        $orderStatus = OrderStatus::where('id', $order->orderStatus_id)
            ->firstOrFail();

        foreach ($products as $product):
            $product['amount_in_order'] = $order->AmountOfProduct($product);
        endforeach;
        return view('Orders.orderDetails', [
            'products' => $products,
            'order' => $order,
            'orderStatus' => $orderStatus->name
        ]);
    }

    function showClosedUserOrders() {
        $orders = Order::where('user_id', \auth()->user()->id)
            ->where('orderStatus_id', 5)
            ->get();

        return view('complaints.orders', [
            'orders' => $orders
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
            Session::put('error', 'Brak dostępnych produktów');
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

        Session::put('success', 'Dodano do koszyka');
        return redirect(route('welcome'));
    }

}
