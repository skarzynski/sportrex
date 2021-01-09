<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    function bruttoPrice()  {
        return $this->netto_price + ($this->netto_price * $this->tax_percent / 100);
    }

    function bruttoPriceWithDiscount()  {
        return number_format(round($this->bruttoPrice() - ($this->bruttoPrice() * $this->discount_percent / 100),2), 2);
    }

    function orders() {
        return $this->belongsToMany(Order::class);
    }

    function categories() {
        return $this->belongsToMany(Category::class);
    }

    function addAmount() {
        $this->amount = $this->amount + 1;
        $this->save();
    }

    function removeAmount() {
        if ($this->amount > 0) {
            $this->amount = $this->amount - 1;
            $this->save();
        }
    }

    function updateAmountByNumber(int $number) {
        if ($this->amount + $number < 0){
            return false;
        }else{
            if ($this->amount >= 0) {
                $this->amount = $this->amount + $number;
                $this->save();
                return true;
            }else{
                return false;
            }
        }

    }

}
