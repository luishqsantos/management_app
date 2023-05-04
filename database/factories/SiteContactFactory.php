<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContact;
use Faker\Generator as Faker;

$factory->define(SiteContact::class, function (Faker $faker) {
    return [
        'name'      => $faker->name(),
        'telephone' => $faker->e164PhoneNumber(),
        'email'     => $faker->unique()->email(),
        'reason'    => $faker->numberBetween(1, 3),
        'message'   => $faker->text()
    ];
});
