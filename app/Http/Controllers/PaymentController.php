<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    function showCardForm(Order $order)
    {

        if (Auth::check()) {
            $userID = auth()->user()->id;
            if ($order->user_id != $userID){
                Session::put('cartFailure', 'Nie masz dostępu do tego koszyka');
                return redirect(route('welcome'));
            }
        }

        $products = $order->products;
        $payments = DB::table('payments')
            ->get();
        $deliveries = DB::table('deliveries')
            ->get();

        return view('Payments.paymentCard', [
            'order' => $order,
        ]);
    }
}
