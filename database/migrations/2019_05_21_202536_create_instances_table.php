<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('application_id')->unsigned()->index();
            $table->integer('server_id')->unsigned()->index();
            $table->string('branch', 100);
            $table->dateTime('last_time_deployed')->nullable();
            $table->string('route',100);  
            $table->integer('autodeploy')->default(0);
            $table->integer('updated')->default(0);
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
        Schema::dropIfExists('instances');
    }
}
