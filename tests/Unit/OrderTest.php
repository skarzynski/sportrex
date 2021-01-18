<?php

namespace Tests\Unit;

use App\Http\Controllers\OrderController;
use App\Models\Order;
use App\Models\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithAuthentication;

class OrderTest extends TestCase
{

    use RefreshDatabase;
    use InteractsWithAuthentication;
    /***
     * scopeUserClosed tests
     */

    public function test_if_the_order_status_is_5_the_order_is_closed() {

        $user = factory(User::class)->create();

        $order = factory(Order::class)->create([
            'user_id' => $user->id,
            'orderStatus_id' => 5
        ]);

        $this->actingAs($user);

        $orders = Order::userClosed()->get();

        $this->assertTrue($orders->contains($order));
    }

    public function test_if_the_user_can_see_only_its_own_closed_orders() {

        $user = factory(User::class)->create();
        $otherUser = factory(User::class)->create();

        $order = factory(Order::class)->create([
            'user_id' => $user->id,
            'orderStatus_id' => 5
        ]);

        $this->actingAs($otherUser);

        $orders = Order::userClosed()->get();

        $this->assertFalse($orders->contains($order));
    }

    /***
     * createOrder tests
     */

    public function test_if_created_order_exists_in_database() {
        $orderID = Order::createOrder();

        $order = Order::find($orderID);

        $this->assertNotNull($order);
    }

    public function test_if_created_order_belongs_to_user() {
        $user = factory(User::class)->create();

        $this->actingAs($user);
        $orderID = Order::createOrder();
        $order = Order::find($orderID);

        $this->assertTrue($order->user_id == $user->id);
    }

    public function test_if_created_order_has_status_one() {
        $expectedStatus = 1;

        $orderID = Order::createOrder();
        $order = Order::find($orderID);

        $this->assertEquals($expectedStatus, $order->orderStatus_id);
    }

    public function test_if_guest_created_order_has_not_belong_to_any_user() {
        $orderID = Order::createOrder();
        $order = Order::find($orderID);

        $this->assertNull($order->user_id);
    }

    public function test_if_created_order_has_price_zero() {
        $expectedPrice = 0;

        $orderID = Order::createOrder();
        $order = Order::find($orderID);

        $this->assertEquals($expectedPrice, $order->price);
    }

    public function test_if_created_order_has_current_or_previous_date() {
        $orderID = Order::createOrder();
        $order = Order::find($orderID);

        $this->assertTrue($order->order_date <= now());
    }



    //Moje testy

    public function test_if_order_hadnt_product_after_create() {
        $order = factory(Order::class)->create();
        $product = factory(Product::class)->create();
        $amountOfProduct = $order->AmountOfProduct($product);
        $this->assertTrue($amountOfProduct == 0);
    }

    public function test_if_amount_of_product_is_zero() {
        $order = factory(Order::class)->create();
        $product = factory(Product::class)->create();

            DB::table('order_product')->insert([
                'order_id' =>$order->id,
                'product_id' => $product->id,
                'amount_of_product' => 0
            ]);

        $amountOfProduct = $order->AmountOfProduct($product);
        $this->assertTrue($amountOfProduct == 0);
    }

    public function test_if_amount_of_product_is_random() {
        $order = factory(Order::class)->create();
        $product = factory(Product::class)->create();
        $amount = rand(1,100);

        DB::table('order_product')->insert([
            'order_id' =>$order->id,
            'product_id' => $product->id,
            'amount_of_product' => $amount
        ]);

        $amountOfProduct = $order->AmountOfProduct($product);
        $this->assertTrue($amountOfProduct == $amount);
    }
    public function test_if_amount_of_product_is_added() {
        $order = factory(Order::class)->create();
        $product = factory(Product::class)->create();
        $amount = rand(1,100);

        DB::table('order_product')->insert([
            'order_id' =>$order->id,
            'product_id' => $product->id,
            'amount_of_product' => $amount
        ]);

        DB::table('order_product')
            ->where('order_id', $order->id)
            ->where('product_id', $product->id)
            ->update(['amount_of_product' => ($amount*2)]);

        $amountOfProduct = $order->AmountOfProduct($product);
        $this->assertEquals($amountOfProduct, ($amount * 2));
    }

    public function test_if_amount_of_product_is_substract() {
        $order = factory(Order::class)->create();
        $product = factory(Product::class)->create();
        $amount = rand(1,90);

        DB::table('order_product')->insert([
            'order_id' =>$order->id,
            'product_id' => $product->id,
            'amount_of_product' => 100
        ]);

        DB::table('order_product')
            ->where('order_id', $order->id)
            ->where('product_id', $product->id)
            ->update(['amount_of_product' => 100 - $amount]);

        $amountOfProduct = $order->AmountOfProduct($product);
        $this->assertTrue($amountOfProduct == 100 - $amount);
    }

    public function test_if_price_of_order_is_zero() {
        $order = factory(Order::class)->create();
        $order->calculatePriceAndSave();
        $this->assertTrue($order->price == 0);
    }

    public function test_price_after_add_delivery_way() {
        $order = factory(Order::class)->create(['orderStatus_id' => 2,'delivery_id' => 2] );
        $order->calculatePriceAndSave();
        $this->assertEquals($order->price,  10);
    }

    public function test_price_with_one_product() {
        $order = factory(Order::class)->create( );
        $product = factory(Product::class)->create();
        $price = $product->bruttoPriceWithDiscount();
        DB::table('order_product')->insert([
            'order_id' =>$order->id,
            'product_id' => $product->id,
            'amount_of_product' => 3
        ]);
        $order->calculatePriceAndSave();
        $this->assertTrue($order->price == $price * 3);
    }


    public function test_price_after_increase_amount_of_product() {
        $order = factory(Order::class)->create( );
        $product = factory(Product::class)->create();
        $price = $product->bruttoPriceWithDiscount();
        DB::table('order_product')->insert([
            'order_id' =>$order->id,
            'product_id' => $product->id,
            'amount_of_product' => 3
        ]);
        $order->calculatePriceAndSave();
        DB::table('order_product')
            ->where('order_id', $order->id)
            ->where('product_id', $product->id)
            ->update(['amount_of_product' => 6]);
        $order->calculatePriceAndSave();
        $this->assertTrue($order->price == $price * 6);
    }

    public function test_price_after_decrease_amount_of_product() {
        $order = factory(Order::class)->create( );
        $product = factory(Product::class)->create();
        $price = $product->bruttoPriceWithDiscount();
        DB::table('order_product')->insert([
            'order_id' =>$order->id,
            'product_id' => $product->id,
            'amount_of_product' => 6
        ]);
        $order->calculatePriceAndSave();
        DB::table('order_product')
            ->where('order_id', $order->id)
            ->where('product_id', $product->id)
            ->update(['amount_of_product' => 3]);
        $order->calculatePriceAndSave();
        $this->assertTrue($order->price == $price * 3);
    }

    public function test_price_with_multiple_products() {
        $order = factory(Order::class)->create( );
        $product = factory(Product::class)->create();
        $price = $product->bruttoPriceWithDiscount();
        DB::table('order_product')->insert([
            'order_id' =>$order->id,
            'product_id' => $product->id,
            'amount_of_product' => 5
        ]);
        $product2 = factory(Product::class)->create();
        $price2 = $product2->bruttoPriceWithDiscount();
        DB::table('order_product')->insert([
            'order_id' =>$order->id,
            'product_id' => $product2->id,
            'amount_of_product' => 6
        ]);
        $order->calculatePriceAndSave();

        $this->assertEquals($order->price, ($price * 5) + ($price2 * 6));
    }

    public function test_price_with_multiple_products_and_delivery() {
        $order = factory(Order::class)->create(['orderStatus_id' => 2,'delivery_id' => 2]  );
        $product = factory(Product::class)->create();
        $price = $product->bruttoPriceWithDiscount();
        DB::table('order_product')->insert([
            'order_id' =>$order->id,
            'product_id' => $product->id,
            'amount_of_product' => 5
        ]);
        $product2 = factory(Product::class)->create();
        $price2 = $product2->bruttoPriceWithDiscount();
        DB::table('order_product')->insert([
            'order_id' =>$order->id,
            'product_id' => $product2->id,
            'amount_of_product' => 6
        ]);
        $order->calculatePriceAndSave();

        $this->assertTrue($order->price == ($price * 5) + ($price2 * 6) + 10);
    }
}
