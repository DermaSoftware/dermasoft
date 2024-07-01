<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hclesion', function (Blueprint $table) {
            $table->dropColumn('hc');
			$table->dropColumn('user');
			$table->dropColumn('company');
			$table->dropColumn('campus');

            $table->foreign('hprocedure_id')->references('id')->on('hprocedure');
			$table->unsignedBigInteger('hprocedure_id')->default(0);
        });
        // Schema::create('hprocedure', function (Blueprint $table) {

        //     // Campos especificos para crioterapia
        //     $table->dropColumn('freeze_time_1');
		// 	$table->dropColumn('freeze_time_2');
		// 	$table->dropColumn('defrost_time_1');
		// 	$table->dropColumn('defrost_time_2');
		// 	$table->dropColumn('timex');
		// 	$table->dropColumn('technique');
		// 	$table->dropColumn('other_technique');
		// 	$table->dropColumn('status');
        // });
        Schema::table('prequest_nprocedure', function (Blueprint $table) {
            $table->string('otro', 100)->nullable()->default('');
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
