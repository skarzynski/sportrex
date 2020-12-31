<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    function bruttoPrice()  {
        return $this->netto_price + ($this->netto_price * $this->tax_percent / 100);
    }

    function bruttoPriceWithDiscount()  {
        return round($this->bruttoPrice() - ($this->bruttoPrice() * $this->discount_percent / 100),2);
    }
    function orders() {
        return $this->belongsToMany(Order::class);
    }
}
