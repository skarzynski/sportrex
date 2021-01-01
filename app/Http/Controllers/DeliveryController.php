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

    function showKurierForm(Order $order){
        $products = $order->products;
        $payments = DB::table('payments')
            ->get();
        $deliveries = DB::table('deliveries')
            ->get();
        return view('Orders.deliveryKurier', [
            'products' => $products,
            'order' => $order,
            'deliveries' => $deliveries,
            'payments' => $payments
        ]);
    }

    function showPocztaForm(Order $order){
        $products = $order->products;
        $payments = DB::table('payments')
            ->get();
        $deliveries = DB::table('deliveries')
            ->get();

        return view('Orders.deliveryPoczta', [
            'products' => $products,
            'order' => $order,
            'deliveries' => $deliveries,
            'payments' => $payments
        ]);
    }

    function showPaczkomatForm(Order $order)
    {
        $products = $order->products;
        $payments = DB::table('payments')
            ->get();
        $deliveries = DB::table('deliveries')
            ->get();

        return view('Orders.deliveryPaczkomat', [
            'products' => $products,
            'order' => $order,
            'deliveries' => $deliveries,
            'payments' => $payments
        ]);
    }

    function doneKurierForm(Order $order)
    {
        $delivery = DB::table('deliveries')
            ->where('name','=','Kurier')
            ->get();
        $price = $order->price + ($delivery[0])->price;
        $orderStatus = DB::table('orderstatus')
            ->where('name','=','W trakcie realizacji')
            ->get();
        $address = \request('form14').\request('form15').\request('form16').\request('form17') ;
        $payment = array_keys($_POST)[1];
        $paymentObj = DB::table('payments')
            ->where('name','=',$payment)
            ->get();

        $email = \request('form19');

        DB::table('orders')
            ->where('id', '=', $order->id)
            ->update(['delivery_address' => $address,'payment_id' => ($paymentObj[0])->id,'email' => $email, 'orderStatus_id' => ($orderStatus[0])->id, 'price' => $price,'delivery_id' => ($delivery[0])->id]);

        echo ("<script> alert('Zamówienie zostało wykonane') </script>");
        return redirect(route('welcome'));
    }

    function donePocztaForm(Order $order)
    {
        $delivery = DB::table('deliveries')
            ->where('name','=','Poczta')
            ->get();
        $price = ($order->price) + (($delivery[0])->price);
        $orderStatus = DB::table('orderstatus')
            ->where('name','=','W trakcie realizacji')
            ->get();
        $address = \request('form14').\request('form15').\request('form16').\request('form17') ;
        $payment = array_keys($_POST)[1];
        $paymentObj = DB::table('payments')
            ->where('name','=',$payment)
            ->get();
        $email = \request('form19');
        DB::table('orders')
            ->where('id', '=', $order->id)
            ->update(['delivery_address' => $address,'payment_id' => ($paymentObj[0])->id,'email' => $email, 'orderStatus_id' => ($orderStatus[0])->id, 'price' => $price,'delivery_id' => ($delivery[0])->id]);

        echo ("<script> alert('Zamówienie zostało wykonane') </script>");

        return redirect(route('welcome'));
    }

    function donePaczkomatForm(Order $order)
    {
        $delivery = DB::table('deliveries')
            ->where('name','=','Paczkomat')
            ->get();
        $orderStatus = DB::table('orderstatus')
            ->where('name','=','W trakcie realizacji')
            ->get();
        $price = $order->price + ($delivery[0])->price;
        $address = \request('form14').\request('form15').\request('form16').\request('form17') ;
        $payment = array_keys($_POST)[1];
        $paymentObj = DB::table('payments')
            ->where('name','=',$payment)
            ->get();
        $email = \request('form19');
        DB::table('orders')
            ->where('id', '=', $order->id)
            ->update(['delivery_address' => $address,'payment_id' => ($paymentObj[0])->id,'email' => $email, 'orderStatus_id' => ($orderStatus[0])->id, 'price' => $price,'delivery_id' => ($delivery[0])->id]);

        echo ("<script> alert('Zamówienie zostało wykonane') </script>");

        return redirect(route('welcome'));
    }

}
