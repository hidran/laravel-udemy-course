<?php


use Faker\Generator as Faker;
use LaraCourse\Models\AlbumCategory;

$factory->define(AlbumCategory::class, function (Faker $faker) {
    return [
        'category_name' => $faker->text(16),
        'user_id' => 1
    ];
});
