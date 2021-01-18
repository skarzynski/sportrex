<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        if (DB::table('order_product')
            ->where('order_id', '=', $this->id)
            ->where('product_id', '=', $product->id)
            ->doesntExist())
        {
            return 0;
        }
        $amount = (DB::table('order_product')
            ->where('order_id', '=', $this->id)
            ->where('product_id', '=', $product->id)
            ->first())->amount_of_product;
        return $amount;
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

    static function createOrder(): int {
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
        return $orderID;
    }

}
