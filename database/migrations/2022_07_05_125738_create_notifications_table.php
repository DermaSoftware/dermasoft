<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();
			$table->unsignedBigInteger('user')->default(0);
			$table->foreign('user')->references('id')->on('users');
			$table->string('title')->nullable();
			$table->string('body')->nullable();
			$table->string('icon')->default('assets/media/icons/map001.svg');//teh008.svg//map001.svg//gen044.svg
			$table->string('color')->default('primary');
			$table->string('badge')->nullable();//Fecha
			$table->string('status')->default('Nuevo');
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
        Schema::dropIfExists('notifications');
    }
}
