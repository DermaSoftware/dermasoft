<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableAntecedentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('antecedentes', function (Blueprint $table) {
            $table->unsignedBigInteger('doctor')->default(0);//Doctor
			$table->foreign('doctor')->references('id')->on('users');
            $table->unsignedBigInteger('appointments_id')->default(0);//Procedimiento
			$table->foreign('appointments_id')->references('id')->on('appointments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
