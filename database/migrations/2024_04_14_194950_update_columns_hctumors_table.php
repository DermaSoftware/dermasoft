<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsHctumorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hctumors', function (Blueprint $table) {
            $table->unsignedBigInteger('hprocedure_id')->default(0);//Procedimiento
			$table->foreign('hprocedure_id')->references('id')->on('hprocedure');
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
