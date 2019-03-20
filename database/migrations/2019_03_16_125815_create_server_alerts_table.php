<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServerAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_alerts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('metric_type_id')->index();
            $table->integer('server_id')->index();
            $table->integer('limit');
            $table->string('message',400);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('server_alerts');
    }
}
