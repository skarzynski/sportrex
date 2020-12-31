<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable =['delivery_address','price','order_date','email'];

    function delivery() {
        return $this->belongsTo(Delivery::class);
    }

    function payment() {
        return $this->belongsTo(Payment::class);
    }

    function orderStatus() {
        return $this->belongsTo(OrderStatus::class);
    }

    function products() {
        return $this->belongsToMany(Product::class);
    }


}