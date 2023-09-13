<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use App\Utils\Utils;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {

    $name = $faker->unique()->name();

    //Remove acentos e substritui caracteres especias do português
    $formatedName = Utils::removeAccentedChars($name);

    //Remove pontos e elimina espaços  para criar o dominio
    $domain = rtrim(str_replace(' ', '', $formatedName), '.');

    return [
        'name'      => $name,
        'email'     => $domain . '@' . $faker->domainName(),
        'telephone' => $faker->phoneNumber(),
        'address'   => $faker->address(),
    ];
});
