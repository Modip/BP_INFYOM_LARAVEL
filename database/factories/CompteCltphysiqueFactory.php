<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CompteCltphysique;
use Faker\Generator as Faker;

$factory->define(CompteCltphysique::class, function (Faker $faker) {

    return [
        'clientphysique_id' => $faker->randomDigitNotNull,
        'numerocompte' => $faker->randomDigitNotNull,
        'solde' => $faker->randomDigitNotNull,
        'clerib' => $faker->randomDigitNotNull,
        'frais' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
