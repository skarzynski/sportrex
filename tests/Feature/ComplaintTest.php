<?php

namespace Tests\Feature;

use App\Models\Order;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ComplaintTest extends TestCase
{
    use RefreshDatabase;

    /***
     * complaint create tests
     */

    public function test_if_complaint_create_route_can_be_accessed_by_logged_user() {
        $user = factory(User::class)->create();
        $order = factory(Order::class)->create([
            'user_id' => $user->id
        ]);
        $expectedStatus = 200;
        $expectedView = "complaints.create";

        $this->actingAs($user);

        $response = $this->get('/order/'.$order->id.'/complaint');

        $response->assertStatus($expectedStatus)
            ->assertViewIs($expectedView);
    }

    public function test_if_complaint_create_route_cannot_be_accessed_by_logged_user_when_its_other_user_order() {
        $user = factory(User::class)->create();
        $other_user = factory(User::class)->create();
        $order = factory(Order::class)->create([
            'user_id' => $user->id
        ]);
        $expectedStatus = 302;
        $expectedRedirect = route('welcome');

        $this->actingAs($other_user);

        $response = $this->get('/order/'.$order->id.'/complaint');

        $response->assertStatus($expectedStatus)
            ->assertSessionHas('error', 'Nie masz dostępu do tego zamówienia')
            ->assertRedirect($expectedRedirect);
    }

    public function test_if_complaint_create_route_cannot_be_accessed_by_logged_user_when_its_guest_user_order() {
        $user = factory(User::class)->create();
        $order = factory(Order::class)->create();
        $expectedStatus = 302;
        $expectedRedirect = route('welcome');

        $this->actingAs($user);

        $response = $this->get('/order/'.$order->id.'/complaint');

        $response->assertStatus($expectedStatus)
            ->assertSessionHas('error', 'Nie masz dostępu do tego zamówienia')
            ->assertRedirect($expectedRedirect);
    }

    public function test_if_complaint_create_route_cannot_be_accessed_by_guest_user_when_its_other_user_order() {
        $user = factory(User::class)->create();
        $order = factory(Order::class)->create([
            'user_id' => $user->id
        ]);
        $expectedStatus = 302;
        $expectedRedirect = '/login';


        $response = $this->get('/order/'.$order->id.'/complaint');

        $response->assertStatus($expectedStatus)
            ->assertRedirect($expectedRedirect);
    }

    public function test_if_complaint_create_route_can_be_accessed_by_guest_user() {
        $expectedStatus = 200;
        $expectedView = "complaints.create";

        $response = $this->get('/complaint/create');

        $response->assertStatus($expectedStatus)
            ->assertViewIs($expectedView);
    }

}
