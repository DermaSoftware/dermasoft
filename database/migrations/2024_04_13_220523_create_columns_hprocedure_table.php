<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnsHprocedureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hprocedure', function (Blueprint $table) {
            $table->unsignedBigInteger('diagnostic_id')->default(0);//Doctor
			$table->foreign('diagnostic_id')->references('id')->on('hcdermdiagnostics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('columns_hprocedure');
    }
}
