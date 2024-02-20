<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsrolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainingsroles', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('trainings_id')->default(0);
			$table->foreign('trainings_id')->references('id')->on('trainings');
			$table->unsignedBigInteger('roles_id')->default(0);
			$table->foreign('roles_id')->references('id')->on('roles');
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
        Schema::dropIfExists('trainingsroles');
    }
}
