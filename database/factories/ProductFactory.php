<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
    'name' => $faker->name,
    'description' => $faker->words,
    'netto_price' => $faker->randomFloat(2,1,100),
    'tax_percent' => $faker->numberBetween(5,35),
    'discount_percent' => $faker->numberBetween(0,70),
    'amount' => $faker->numberBetween(0,40),
    'picture'=> null
    ];
});
