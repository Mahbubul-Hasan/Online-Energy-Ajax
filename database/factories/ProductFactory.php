<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Category;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        "name" => $faker->catchPhrase(),
        "category_id" => Category::all()->random()->id,
        "code" => "QWE" .random_int(10, 100000),
        "photo" => $faker->imageUrl(),
        "price" => random_int(100, 1000),
        "short_description" => $faker->realText(150),
        "long_description" => $faker->realText(300),
    ];
});
