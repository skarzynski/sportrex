<?php

/** @var Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'delivery_address' => $faker->address,
        'price' => $faker->randomFloat(2, 1, 100),
        'order_date' => Carbon::now(),
        'email' => $faker->email,
        'orderStatus_id' => 1
    ];
});
