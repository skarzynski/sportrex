<?php

namespace Tests\Unit;

use App\Http\Controllers\OrderController;
use App\Models\Order;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithAuthentication;

class OrderTest extends TestCase
{

    use RefreshDatabase;
    use InteractsWithAuthentication;


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
}
