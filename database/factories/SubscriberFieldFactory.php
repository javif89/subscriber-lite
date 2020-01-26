<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SubscriberField;
use Faker\Generator as Faker;

$factory->define(SubscriberField::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'value' => $faker->sentence,
        'type' => collect(['date', 'number', 'string', 'boolean'])->shuffle()->first()
    ];
});
