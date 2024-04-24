<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHprocedureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hprocedure', function (Blueprint $table) {
            $table->dropColumn('procedure_request_id');
        });
        Schema::table('hprocedure', function (Blueprint $table) {
            $table->unsignedBigInteger('prequest_nprocedure_id')->default(0);//Doctor
			$table->foreign('prequest_nprocedure_id')->references('id')->on('prequest_nprocedure');
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
