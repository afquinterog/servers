<?php

use Faker\Generator as Faker;

use Carbon\Carbon;

$factory->define(App\Models\ServerMetric::class, function (Faker $faker) {
    $created_at = Carbon::createFromTimestamp($faker->dateTimeBetween($startDate = '-2 days', $endDate = '+0 days')->getTimeStamp());
    //$ends_at= Carbon::createFromFormat('Y-m-d H:i:s', $starts_at)->addHours( $faker->numberBetween( 1, 8 ) );
    return [

        'metric_type_id' => 6,
        'server_id' => 1 ,
        'value' => $faker->randomNumber(2),
        'created_at' => $created_at,
        
    ];
});




