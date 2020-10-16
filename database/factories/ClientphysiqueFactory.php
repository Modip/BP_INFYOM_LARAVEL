<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Clientphysique;
use Faker\Generator as Faker;

$factory->define(Clientphysique::class, function (Faker $faker) {

    return [
        'prenom' => $faker->word,
        'nom' => $faker->word,
        'adresse' => $faker->word,
        'cni' => $faker->randomDigitNotNull,
        'telephone' => $faker->randomDigitNotNull,
        'email' => $faker->word,
        'login' => $faker->word,
        'password' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
