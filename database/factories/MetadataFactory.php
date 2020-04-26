<?php

/** @var Factory $factory */
/** @var Faker $faker */

use App\Artefact;
use App\Metadata;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Metadata::class, function ($faker) use ($factory) {
    return [
        'name' => $faker->streetName,
        'noteCZ' => $faker->paragraph,
        'noteEN' => $faker->paragraph,
        'page' => rand(0, 2000),
        'artefact_id' => factory(Artefact::class)->create()->id
    ];
});
