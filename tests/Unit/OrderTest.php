<?php

namespace Tests\Unit;

use App\Models\Order;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithAuthentication;

class OrderTest extends TestCase
{

    use RefreshDatabase;
    use InteractsWithAuthentication;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

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
}
