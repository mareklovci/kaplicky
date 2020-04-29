<?php

/** @var Factory $factory */
/** @var Faker $faker */

use App\Artefact;
use App\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Artefact::class, function ($faker) {
    return [
        'name' => $faker->opera,
        'author' => $faker->name,
        'made_in' => $faker->countryCode,
        'publisher' => $faker->company,
        'year' => rand(1800, 2020),
        'pages' => rand(0, 2000),
        'main_category_id' => factory(Category::class)->create()->id,
    ];
});
