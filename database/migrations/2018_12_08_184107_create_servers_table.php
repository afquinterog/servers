<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 100)->nullable();
            $table->string('name');
            $table->string('user', 30);
            $table->integer('server_type_id');
            $table->string('status', 20)->default('running');
            $table->integer('active')->default(1);
            $table->float('cost')->default(0);
            $table->timestamp('instance_created_at');
            $table->string('token', 25)->nullable();
            $table->timestamp('ping_at');
            $table->string('key', 100);
            $table->softDeletes();
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
        Schema::dropIfExists('servers');
    }
}
