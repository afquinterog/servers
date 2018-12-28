<?php

use Illuminate\Database\Seeder;

class MetricTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\ServerMetric::class, 50)->create()->each(function ($metric) {
            //$user->posts()->save(factory(App\Post::class)->make());
        });
    }
}
