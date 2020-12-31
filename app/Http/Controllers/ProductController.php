<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function orders() {
        return $this->belongsToMany(Order::class);
    }
}
