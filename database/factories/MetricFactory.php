<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ServerMetric::class, function (Faker $faker) {
    return [

        'metric_type_id' => 1,
        'server_id' => 28 ,
        'value' => $faker->randomNumber(2)
        
    ];
});
