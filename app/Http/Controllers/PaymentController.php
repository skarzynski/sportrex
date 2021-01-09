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

        return view('Payments.paymentCard', [
            'order' => $order,
        ]);
    }

    function doneCardForm(Order $order)
    {

        if (Auth::check()) {
            $userID = auth()->user()->id;
            if ($order->user_id != $userID){
                Session::put('cartFailure', 'Nie masz dostępu do tego koszyka');
                return redirect(route('welcome'));
            }
        }
        Session::forget('orderID');
        Session::put('OrderDone', 'Zamówienie zostało wykonane');
        return redirect(route('welcome'));
    }

    function showTransferForm(Order $order)
    {
        if (Auth::check()) {
            $userID = auth()->user()->id;
            if ($order->user_id != $userID){
                Session::put('cartFailure', 'Nie masz dostępu do tego koszyka');
                return redirect(route('welcome'));
            }
        }
        $banks = DB::table('banks')
            ->get();

        return view('Payments.paymentTransfer', [
            'order' => $order,
            'banks' => $banks
        ]);
    }

    function doneTransferForm(Order $order)
    {
        if (Auth::check()) {
            $userID = auth()->user()->id;
            if ($order->user_id != $userID){
                Session::put('cartFailure', 'Nie masz dostępu do tego koszyka');
                return redirect(route('welcome'));
            }
        }
        Session::forget('orderID');
        Session::put('OrderDone', 'Zamówienie zostało wykonane');
        return redirect(route('welcome'));
    }

}
