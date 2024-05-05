<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->string('hc_type')->nullable();//Tipo de consulta

        });
        Schema::table('hprocedure', function (Blueprint $table) {
            $table->integer('total')->nullable();

        });
        Schema::table('hcdermdiagnostics', function (Blueprint $table) {
            $table->unsignedBigInteger('appointments_id')->default(0);//Procedimiento
			$table->foreign('appointments_id')->references('id')->on('appointments');

        });
        Schema::table('hcdermindications', function (Blueprint $table) {
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
