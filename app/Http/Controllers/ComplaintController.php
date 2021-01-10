<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

$validationErrorMessages = [
    'order_id.required' => 'Pole numer zamówienia jest wymagane',
    'order_id.exists' => 'Podany numer zamówienia jest niepoprawny',
    'delivery_address.required' => 'Pole adres dostawy jest wymagane',
    'email_address.required' => 'Pole adres email jest wymagane',
    'complaint_details.required' => 'Pole szczegóły reklamacji jest wymagane'
];


class ComplaintController extends Controller
{

    function create() {
        return view('complaints.create');
    }

    function store() {
        $this->validateComplaint();

        $complaint = new Complaint();

        $complaint->details = \request('complaint_details');
        $complaint->complaint_date = now();
        $complaint->complaintStatus_id = 1;

        $complaint->save();

        DB::table('complaint_order')
            ->insert([
               'order_id' => \request('order_id'),
               'complaint_id'  => $complaint->id
            ]);

        Session::put('success', 'Reklamacja złożona. Potwierdzenie zostało wysłane na email klienta');
        return redirect(route('welcome'));
    }

    protected function validateComplaint() {
        $validationErrorMessages = [
            'order_id.required' => 'Pole numer zamówienia jest wymagane',
            'order_id.exists' => 'Podany numer zamówienia jest niepoprawny',
            'delivery_address.required' => 'Pole adres dostawy jest wymagane',
            'email_address.required' => 'Pole adres email jest wymagane',
            'complaint_details.required' => 'Pole szczegóły reklamacji jest wymagane'
        ];
        $validator = Validator::make(\request()->all(), [
            'order_id' => 'required|exists:orders,id',
            'delivery_address' => 'required',
            'email_address' => 'required',
            'complaint_details' => 'required'
        ], $validationErrorMessages);
//        return request()->validate([
//            'order_id' => 'required|exists:orders,id',
//            'delivery_address' => 'required',
//            'email_address' => 'required',
//            'complaint_details' => 'required'
//        ]);
        return $validator->validate();
    }
}
