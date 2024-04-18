<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnHcsuture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hcsuture', function (Blueprint $table) {
            $table->unsignedBigInteger('hcprocedure_id')->default(0);//médico
			$table->foreign('hcprocedure_id')->references('id')->on('hcprocedure');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('column_hcsuture');
    }
}
