<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaryproceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diaryprocedures', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('diary_id')->default(0);//
			$table->foreign('diary_id')->references('id')->on('diary');
			$table->unsignedBigInteger('procedure')->default(0);//
			$table->foreign('procedure')->references('id')->on('procedures');
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
        Schema::dropIfExists('diaryprocedures');
    }
}
