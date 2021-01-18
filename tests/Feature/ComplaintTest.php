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

    /***
     * complaint store tests
     */

    public function test_if_logged_user_can_create_complaint() {
        $user = factory(User::class)->create();
        $order = factory(Order::class)->create([
            'user_id' => $user->id
        ]);
        $complaintDetails = "Example complaint details";
        $expectedStatus = 302;
        $expectedRedirect = route('welcome');

        $this->actingAs($user);
        $response = $this->post('/complaint', [
                       'order_id' => $order->id,
                       'delivery_address' => $order->delivery_address,
                       'email_address' => $order->email,
                       'complaint_details' => $complaintDetails
                    ]);

        $this->assertDatabaseHas('complaints', [
            'details' => $complaintDetails,
            'complaintStatus_id' => 1
        ])
            ->assertDatabaseHas('complaint_order', [
                'order_id' => $order->id
            ]);

        $response->assertStatus($expectedStatus)
            ->assertSessionHas('success', 'Reklamacja złożona. Potwierdzenie zostało wysłane na email klienta')
            ->assertRedirect($expectedRedirect);
    }

    public function test_if_logged_user_cannot_create_complaint_related_to_other_user_order() {
        $user = factory(User::class)->create();
        $otherUser = factory(User::class)->create();
        $order = factory(Order::class)->create([
            'user_id' => $otherUser->id
        ]);
        $complaintDetails = "Example complaint details";
        $expectedStatus = 302;
        $expectedRedirect = route('welcome');

        $this->actingAs($user);
        $response = $this->post('/complaint', [
            'order_id' => $order->id,
            'delivery_address' => $order->delivery_address,
            'email_address' => $order->email,
            'complaint_details' => $complaintDetails
        ]);

        $this->assertDatabaseMissing('complaints', [
            'details' => $complaintDetails,
            'complaintStatus_id' => 1
        ])
            ->assertDatabaseMissing('complaint_order', [
                'order_id' => $order->id
            ]);

        $response->assertStatus($expectedStatus)
            ->assertSessionHas('error', 'Nie masz dostępu do tego zamówienia')
            ->assertRedirect($expectedRedirect);
    }

    public function test_if_logged_user_cannot_create_complaint_related_to_guest_user_order() {
        $user = factory(User::class)->create();
        $order = factory(Order::class)->create();
        $complaintDetails = "Example complaint details";
        $expectedStatus = 302;
        $expectedRedirect = route('welcome');

        $this->actingAs($user);
        $response = $this->post('/complaint', [
            'order_id' => $order->id,
            'delivery_address' => $order->delivery_address,
            'email_address' => $order->email,
            'complaint_details' => $complaintDetails
        ]);

        $this->assertDatabaseMissing('complaints', [
            'details' => $complaintDetails,
            'complaintStatus_id' => 1
        ])
            ->assertDatabaseMissing('complaint_order', [
                'order_id' => $order->id
            ]);

        $response->assertStatus($expectedStatus)
            ->assertSessionHas('error', 'Nie masz dostępu do tego zamówienia')
            ->assertRedirect($expectedRedirect);
    }

    public function test_if_guest_user_can_create_complaint() {
        $order = factory(Order::class)->create();
        $complaintDetails = "Example complaint details";
        $expectedStatus = 302;
        $expectedRedirect = route('welcome');

        $response = $this->post('/complaint', [
            'order_id' => $order->id,
            'delivery_address' => $order->delivery_address,
            'email_address' => $order->email,
            'complaint_details' => $complaintDetails
        ]);

        $this->assertDatabaseHas('complaints', [
            'details' => $complaintDetails,
            'complaintStatus_id' => 1
        ])
            ->assertDatabaseHas('complaint_order', [
                'order_id' => $order->id
            ]);

        $response->assertStatus($expectedStatus)
            ->assertSessionHas('success', 'Reklamacja złożona. Potwierdzenie zostało wysłane na email klienta')
            ->assertRedirect($expectedRedirect);
    }

    public function test_if_guest_user_cannot_create_complaint_related_to_other_user_order() {
        $user = factory(User::class)->create();
        $order = factory(Order::class)->create([
            'user_id' => $user->id
        ]);
        $complaintDetails = "Example complaint details";
        $expectedStatus = 302;
        $expectedRedirect = route('welcome');

        $response = $this->post('/complaint', [
            'order_id' => $order->id,
            'delivery_address' => $order->delivery_address,
            'email_address' => $order->email,
            'complaint_details' => $complaintDetails
        ]);

        $this->assertDatabaseMissing('complaints', [
            'details' => $complaintDetails,
            'complaintStatus_id' => 1
        ])
            ->assertDatabaseMissing('complaint_order', [
                'order_id' => $order->id
            ]);

        $response->assertStatus($expectedStatus)
            ->assertSessionHas('error', 'Nie masz dostępu do tego zamówienia')
            ->assertRedirect($expectedRedirect);
    }

    public function test_if_guest_user_cannot_create_complaint_with_wrong_email_address() {
        $order = factory(Order::class)->create();
        $complaintDetails = "Example complaint details";
        $expectedStatus = 302;
        $expectedRedirect = route('complaint.create');

        $response = $this->post('/complaint', [
            'order_id' => $order->id,
            'delivery_address' => $order->delivery_address,
            'email_address' => 'wrong@email.address',
            'complaint_details' => $complaintDetails
        ]);

        $this->assertDatabaseMissing('complaints', [
            'details' => $complaintDetails,
            'complaintStatus_id' => 1
        ])
            ->assertDatabaseMissing('complaint_order', [
                'order_id' => $order->id
            ]);

        $response->assertStatus($expectedStatus)
            ->assertSessionHas('error', 'Niepoprawne dane')
            ->assertRedirect($expectedRedirect);
    }

    public function test_if_guest_user_cannot_create_complaint_with_wrong_delivery_address() {
        $order = factory(Order::class)->create();
        $complaintDetails = "Example complaint details";
        $expectedStatus = 302;
        $expectedRedirect = route('complaint.create');

        $response = $this->post('/complaint', [
            'order_id' => $order->id,
            'delivery_address' => 'wrong delivery address',
            'email_address' => $order->email,
            'complaint_details' => $complaintDetails
        ]);

        $this->assertDatabaseMissing('complaints', [
            'details' => $complaintDetails,
            'complaintStatus_id' => 1
        ])
            ->assertDatabaseMissing('complaint_order', [
                'order_id' => $order->id
            ]);

        $response->assertStatus($expectedStatus)
            ->assertSessionHas('error', 'Niepoprawne dane')
            ->assertRedirect($expectedRedirect);
    }

    public function test_if_guest_user_cannot_create_complaint_with_wrong_delivery_address_and_wrong_email_address() {
        $order = factory(Order::class)->create();
        $complaintDetails = "Example complaint details";
        $expectedStatus = 302;
        $expectedRedirect = route('complaint.create');

        $response = $this->post('/complaint', [
            'order_id' => $order->id,
            'delivery_address' => 'wrong delivery address',
            'email_address' => 'wrong@email.address',
            'complaint_details' => $complaintDetails
        ]);

        $this->assertDatabaseMissing('complaints', [
            'details' => $complaintDetails,
            'complaintStatus_id' => 1
        ])
            ->assertDatabaseMissing('complaint_order', [
                'order_id' => $order->id
            ]);

        $response->assertStatus($expectedStatus)
            ->assertSessionHas('error', 'Niepoprawne dane')
            ->assertRedirect($expectedRedirect);
    }

    public function test_if_user_cannot_create_complaint_with_complaint_details_validation_fail() {
        $order = factory(Order::class)->create();
        $complaintDetails = "";
        $expectedStatus = 302;
        $expectedRedirect = route('complaint.create');

        $response = $this->post('/complaint', [
            'order_id' => $order->id,
            'delivery_address' => $order->delivery_address,
            'email_address' => $order->email,
            'complaint_details' => $complaintDetails
        ]);

        $this->assertDatabaseMissing('complaints', [
            'details' => $complaintDetails,
            'complaintStatus_id' => 1
        ])
            ->assertDatabaseMissing('complaint_order', [
                'order_id' => $order->id
            ]);

        $response->assertStatus($expectedStatus)
            ->assertSessionHasErrors();
    }

    public function test_if_user_cannot_create_complaint_with_missing_order_id_validation_fail() {
        $order = factory(Order::class)->create();
        $complaintDetails = "Example complaint details";
        $expectedStatus = 302;
        $expectedRedirect = route('complaint.create');

        $response = $this->post('/complaint', [
            'order_id' => "",
            'delivery_address' => $order->delivery_address,
            'email_address' => $order->email,
            'complaint_details' => $complaintDetails
        ]);

        $this->assertDatabaseMissing('complaints', [
            'details' => $complaintDetails,
            'complaintStatus_id' => 1
        ])
            ->assertDatabaseMissing('complaint_order', [
                'order_id' => $order->id
            ]);

        $response->assertStatus($expectedStatus)
            ->assertSessionHasErrors();
    }

    public function test_if_user_cannot_create_complaint_with_not_exist_order_id_validation_fail() {
        $order = factory(Order::class)->create();
        $complaintDetails = "Example complaint details";
        $expectedStatus = 302;
        $expectedRedirect = route('complaint.create');

        $response = $this->post('/complaint', [
            'order_id' => "wrong_id",
            'delivery_address' => $order->delivery_address,
            'email_address' => $order->email,
            'complaint_details' => $complaintDetails
        ]);

        $this->assertDatabaseMissing('complaints', [
            'details' => $complaintDetails,
            'complaintStatus_id' => 1
        ])
            ->assertDatabaseMissing('complaint_order', [
                'order_id' => $order->id
            ]);

        $response->assertStatus($expectedStatus)
            ->assertSessionHasErrors();
    }

    public function test_if_user_cannot_create_complaint_with_delivery_address_validation_fail() {
        $order = factory(Order::class)->create();
        $complaintDetails = "Example complaint details";
        $expectedStatus = 302;
        $expectedRedirect = route('complaint.create');

        $response = $this->post('/complaint', [
            'order_id' => $order->id,
            'delivery_address' => "",
            'email_address' => $order->email,
            'complaint_details' => $complaintDetails
        ]);

        $this->assertDatabaseMissing('complaints', [
            'details' => $complaintDetails,
            'complaintStatus_id' => 1
        ])
            ->assertDatabaseMissing('complaint_order', [
                'order_id' => $order->id
            ]);

        $response->assertStatus($expectedStatus)
            ->assertSessionHasErrors();
    }

    public function test_if_user_cannot_create_complaint_with_email_address_validation_fail() {
        $order = factory(Order::class)->create();
        $complaintDetails = "Example complaint details";
        $expectedStatus = 302;
        $expectedRedirect = route('complaint.create');

        $response = $this->post('/complaint', [
            'order_id' => $order->id,
            'delivery_address' => $order->delivery_address,
            'email_address' => "",
            'complaint_details' => $complaintDetails
        ]);

        $this->assertDatabaseMissing('complaints', [
            'details' => $complaintDetails,
            'complaintStatus_id' => 1
        ])
            ->assertDatabaseMissing('complaint_order', [
                'order_id' => $order->id
            ]);

        $response->assertStatus($expectedStatus)
            ->assertSessionHasErrors();
    }

}
