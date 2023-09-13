<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Provider;
use App\Utils\Utils;
use Faker\Generator as Faker;


$factory->define(Provider::class, function (Faker $faker) {

    $name   = $faker->company();
    //Remove acentos e substritui caracteres especias do português
    $formatedName = Utils::removeAccentedChars($name);

    //Remove pontos e elimina espaços  para criar o dominio
    $domain = rtrim(str_replace(' ', '', $formatedName),'.');

    return [
        'name'  => $name,
        'site'  => 'www.'.$domain.'.com',
        'uf'    => $faker->stateAbbr(),
        'email' => $domain.'@'.$faker->domainName()
    ];
});
