<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableHcchecklist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hcchecklist', function (Blueprint $table) {
            $table->dropColumn('user');
            $table->dropColumn('company');
            $table->dropColumn('campus');
            $table->unsignedBigInteger('appointments_id')->default(0);//Procedimiento
			$table->foreign('appointments_id')->references('id')->on('appointments');
        });
        Schema::table('hcconsent', function (Blueprint $table) {
            $table->dropColumn('user');
            $table->dropColumn('company');
            $table->dropColumn('campus');
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
