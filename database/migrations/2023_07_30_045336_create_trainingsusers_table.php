<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainingsusers', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('trainings_id')->default(0);
			$table->foreign('trainings_id')->references('id')->on('trainings');
			$table->unsignedBigInteger('users_id')->default(0);
			$table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('trainingsusers');
    }
}
