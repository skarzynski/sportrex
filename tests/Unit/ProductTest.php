<?php

namespace Tests\Unit;

use App\Http\Controllers\OrderController;
use App\Models\Order;
use App\Models\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithAuthentication;

class ProductTest extends TestCase
{

    use RefreshDatabase;
    use InteractsWithAuthentication;


    public function test_if_price_with_tax_and_discount_is_more_than_zero() {

        $product = factory(Product::class)->create();
        $bruttoPriceWithDiscount = $product::bruttoPriceWithDiscount();

        $this->assertTrue($bruttoPriceWithDiscount > 0);
    }

    public function test_if_price_with_tax_and_discount_is_float() {

        $product = factory(Product::class)->create();
        $bruttoPriceWithDiscount = $product::bruttoPriceWithDiscount();

        $this->assertTrue(is_float($bruttoPriceWithDiscount));
    }

    public function test_if_price_with_tax_and_discount_is_max_two_decimal_accuracy() {

        $product = factory(Product::class)->create();
        $bruttoPriceWithDiscount = $product::bruttoPriceWithDiscount();

        $this->assertTrue(number_format($bruttoPriceWithDiscount,2) == $bruttoPriceWithDiscount);
    }


    public function test_if_price_with_tax_and_discount_is_0_for_100percent_discount() {

        $product = factory(Product::class)->create([ 'discount_percent' => 100]);
        $bruttoPriceWithDiscount = $product::bruttoPriceWithDiscount();

        $this->assertTrue($bruttoPriceWithDiscount == 0);
    }

    public function test_if_price_with_tax_and_discount_is_normal_for_0percent_discount() {

        $price = 100;
        $tax = 23;
        $bruttoPrice = ($price * $tax/100 ) + $price;
        $product = factory(Product::class)->create([ 'discount_percent' => 0, 'netto_price' => $price, 'tax_percent' => $tax]);
        $bruttoPriceWithDiscount = $product::bruttoPriceWithDiscount();

        $this->assertTrue($bruttoPriceWithDiscount == $bruttoPrice);
    }

    public function test_if_price_with_tax_and_discount_is_normal_for_0percent_tax() {

        $price = 100;
        $product = factory(Product::class)->create([ 'discount_percent' => 0, 'netto_price' => $price, 'tax_percent' => 0]);
        $bruttoPriceWithDiscount = $product::bruttoPriceWithDiscount();

        $this->assertTrue($bruttoPriceWithDiscount == $price);
    }

    public function test_if_price_with_tax_and_discount_is_doubled_for_100percent_tax() {

        $price = 100;
        $product = factory(Product::class)->create([ 'discount_percent' => 0, 'netto_price' => $price, 'tax_percent' => 100]);
        $bruttoPriceWithDiscount = $product::bruttoPriceWithDiscount();

        $this->assertTrue($bruttoPriceWithDiscount == $price*2);
    }

}
