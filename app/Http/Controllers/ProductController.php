<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index() {
        if (\request('category')) {
            $products = Category::where('name', \request('category'))
                ->firstOrFail()
                ->products()
                ->Paginate(9);
        } else {
            $products = Product::simplePaginate(9);
        }

        $categories = Category::all();

        return view('welcome', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
