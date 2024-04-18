<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumns2HprocedureTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hprocedure', function (Blueprint $table) {
            $table->string('surgeon')->nullable();//Cirujano
            $table->string('assistant')->nullable();//Ayudante
            $table->string('instrumentalist')->nullable();//Instrumentador
            $table->string('anesthesiologist')->nullable();//Anestesiólogo
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
