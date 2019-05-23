<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('http_repo', 300);
            $table->string('ssh_repo', 300);
            $table->string('branch', 100);
            $table->string('author', 150);
            $table->datetime('timestamp');
            $table->text('message');
            $table->string('url', 200);
            $table->string('previous', 200);
            $table->string('actual', 200);
            $table->integer('application_id')->index();
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
        Schema::dropIfExists('commits');
    }
}
