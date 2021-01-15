<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $fillable =['delivery_address','price','order_date','email'];

    function calculatePriceAndSave() {
        $products = $this->products;
        $price = 0;
        foreach ($products as $product):
            $price += $product->bruttoPriceWithDiscount() * $this->AmountOfProduct($product);
        endforeach;
        if($this->orderStatus_id == 2 or $this->orderStatus_id == 3){
            $price += $this->delivery->price;
        }
        $this->price = $price;
        $this->save();
    }

    function delivery() {
        return $this->belongsTo(Delivery::class);
    }

    function payment() {
        return $this->belongsTo(Payment::class);
    }

    function orderStatus() {
        return $this->belongsTo(OrderStatus::class);
    }

    function AmountOfProduct(Product $product){
        return (DB::table('order_product')
            ->where('order_id', '=', $this->id)
            ->where('product_id', '=', $product->id)
            ->get())[0]->amount_of_product;
    }

    function products() {
        return $this->belongsToMany(Product::class);
    }

    function complaints() {
        return $this->hasMany(Complaint::class);
    }

    public function scopeUserClosed($query) {
        return $query->where('user_id', \auth()->user()->id)
            ->where('orderStatus_id', 5);
    }

}
