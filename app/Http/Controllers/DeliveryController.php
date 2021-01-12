<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DeliveryController extends Controller
{
    function showDeliveries(Order $order) {

        if (Auth::check()) {
            $userID = auth()->user()->id;
            if ($order->user_id != $userID){
                Session::put('cartFailure', 'Nie masz dostępu do tego koszyka');
                return redirect(route('welcome'));
            }
        }

        $products = $order->products;
        foreach ($products as $product):
            $product['amount_in_order'] = $order->AmountOfProduct($product);
        endforeach;

        $deliveries = DB::table('deliveries')
            ->get();

        return view('Deliveries.delivery', [
            'products' => $products,
            'order' => $order,
            'deliveries' => $deliveries
        ]);
    }

    function showCourierForm(Order $order){

        if (Auth::check()) {
            $userID = auth()->user()->id;
            if ($order->user_id != $userID){
                Session::put('cartFailure', 'Nie masz dostępu do tego koszyka');
                return redirect(route('welcome'));
            }
        }

        $products = $order->products;
        foreach ($products as $product):
            $product['amount_in_order'] = $order->AmountOfProduct($product);
        endforeach;
        $payments = DB::table('payments')
            ->get();
        $deliveries = DB::table('deliveries')
            ->get();
        return view('Deliveries.deliveryKurier', [
            'products' => $products,
            'order' => $order,
            'deliveries' => $deliveries,
            'payments' => $payments
        ]);
    }

    function showPostForm(Order $order){

        if (Auth::check()) {
            $userID = auth()->user()->id;
            if ($order->user_id != $userID){
                Session::put('cartFailure', 'Nie masz dostępu do tego koszyka');
                return redirect(route('welcome'));
            }
        }

        $products = $order->products;
        foreach ($products as $product):
            $product['amount_in_order'] = $order->AmountOfProduct($product);
        endforeach;
        $payments = DB::table('payments')
            ->get();
        $deliveries = DB::table('deliveries')
            ->get();

        return view('Deliveries.deliveryPoczta', [
            'products' => $products,
            'order' => $order,
            'deliveries' => $deliveries,
            'payments' => $payments
        ]);
    }

    function showParcelLockerForm(Order $order)
    {

        if (Auth::check()) {
            $userID = auth()->user()->id;
            if ($order->user_id != $userID){
                Session::put('cartFailure', 'Nie masz dostępu do tego koszyka');
                return redirect(route('welcome'));
            }
        }

        $products = $order->products;
        foreach ($products as $product):
            $product['amount_in_order'] = $order->AmountOfProduct($product);
        endforeach;
        $payments = DB::table('payments')
            ->get();
        $deliveries = DB::table('deliveries')
            ->get();

        return view('Deliveries.deliveryPaczkomat', [
            'products' => $products,
            'order' => $order,
            'deliveries' => $deliveries,
            'payments' => $payments
        ]);
    }

    function doneCourierForm(Order $order)
    {

        if (Auth::check()) {
            $userID = auth()->user()->id;
            if ($order->user_id != $userID){
                Session::put('cartFailure', 'Nie masz dostępu do tego koszyka');
                return redirect(route('welcome'));
            }
        }

        $delivery = DB::table('deliveries')
            ->where('name','=','Kurier')
            ->get();
        $price = $order->price + ($delivery[0])->price;
        $orderStatus = DB::table('order_statuses')
            ->where('name','=','W trakcie realizacji')
            ->get();
        $address = \request('form14')." ".\request('form15')." ".\request('form16')." ".\request('form17') ;
        $payment = array_keys($_POST)[1];


        $paymentObj = DB::table('payments')
            ->where('name','=',$payment)
            ->get();

        $email = \request('form19');

        DB::table('orders')
            ->where('id', '=', $order->id)
            ->update(['delivery_address' => $address,'payment_id' => ($paymentObj[0])->id,'email' => $email, 'orderStatus_id' => ($orderStatus[0])->id, 'price' => $price,'delivery_id' => ($delivery[0])->id]);

        if ($payment == "Karta"){
            return redirect(route('Payment.Card',$order->id));
        }elseif ($payment == "Przelew"){
            return redirect(route('Payment.Transfer',$order->id));
        }else{
            Session::forget('orderID');
            Session::put('OrderDone', 'Zamówienie zostało wykonane');
            return redirect(route('welcome'));
        }
    }

    function donePostForm(Order $order)
    {

        if (Auth::check()) {
            $userID = auth()->user()->id;
            if ($order->user_id != $userID){
                Session::put('cartFailure', 'Nie masz dostępu do tego koszyka');
                return redirect(route('welcome'));
            }
        }

        $delivery = DB::table('deliveries')
            ->where('name','=','Poczta')
            ->get();
        $price = ($order->price) + (($delivery[0])->price);
        $orderStatus = DB::table('order_statuses')
            ->where('name','=','W trakcie realizacji')
            ->get();
        $address = \request('form14')." ".\request('form15')." ".\request('form16')." ".\request('form17') ;
        $payment = array_keys($_POST)[1];
        $paymentObj = DB::table('payments')
            ->where('name','=',$payment)
            ->get();
        $email = \request('form19');
        DB::table('orders')
            ->where('id', '=', $order->id)
            ->update(['delivery_address' => $address,'payment_id' => ($paymentObj[0])->id,'email' => $email, 'orderStatus_id' => ($orderStatus[0])->id, 'price' => $price,'delivery_id' => ($delivery[0])->id]);

        if ($payment == "Karta"){
            return redirect(route('Payment.Card',$order->id));
        }elseif ($payment == "Przelew"){
            return redirect(route('Payment.Transfer',$order->id));
        }else{
            Session::forget('orderID');
            Session::put('OrderDone', 'Zamówienie zostało wykonane');
            return redirect(route('welcome'));
        }
    }

    function doneParcelLockerForm(Order $order)
    {

        if (Auth::check()) {
            $userID = auth()->user()->id;
            if ($order->user_id != $userID){
                Session::put('cartFailure', 'Nie masz dostępu do tego koszyka');
                return redirect(route('welcome'));
            }
        }

        $delivery = DB::table('deliveries')
            ->where('name','=','Paczkomat')
            ->get();
        $orderStatus = DB::table('order_statuses')
            ->where('name','=','W trakcie realizacji')
            ->get();
        $price = $order->price + ($delivery[0])->price;
        $address = \request('address');
        $payment = array_keys($_POST)[1];
        $paymentObj = DB::table('payments')
            ->where('name','=',$payment)
            ->get();
        $email = \request('form19');
        DB::table('orders')
            ->where('id', '=', $order->id)
            ->update(['delivery_address' => $address,'payment_id' => ($paymentObj[0])->id,'email' => $email, 'orderStatus_id' => ($orderStatus[0])->id, 'price' => $price,'delivery_id' => ($delivery[0])->id]);
        if ($payment == "Karta"){
            return redirect(route('Payment.Card',$order->id));
        }elseif ($payment == "Przelew"){
            return redirect(route('Payment.Transfer',$order->id));
        }else{
            Session::forget('orderID');
            Session::put('OrderDone', 'Zamówienie zostało wykonane');
            return redirect(route('welcome'));
        }
    }

}
