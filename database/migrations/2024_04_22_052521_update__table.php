<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('procedure_request', function (Blueprint $table) {
            $table->unsignedBigInteger('prequest_nprocedure_id')->default(0);//Doctor
			$table->foreign('prequest_nprocedure_id')->references('id')->on('prequest_nprocedure');
        });
        Schema::table('prescription', function (Blueprint $table) {
            $table->string('hc_type')->nullable();//Tipo de consulta
        });
        Schema::table('exam_request', function (Blueprint $table) {
            $table->string('hc_type')->nullable();//Tipo de consulta
        });
        Schema::table('patology_request', function (Blueprint $table) {
            $table->string('hc_type')->nullable();//Tipo de consulta
        });
    }
}
