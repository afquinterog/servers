<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('application_id')->index();
            $table->string('name', 100); 
            $table->string('value', 200);
            $table->timestamps();

            $table->unique( array('application_id','name') );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('server_parameters');
    }
}
