<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAntecedentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->id();
            $table->uuid('uuid')->unique();//
            $table->text('resumen');//Resumen

            $table->unsignedBigInteger('type_id')->default(0);//médico
			$table->foreign('type_id')->references('id')->on('tipoantecedentes');

            $table->unsignedBigInteger('hc')->default(0);//HC dermatology
			$table->foreign('hc')->references('id')->on('dermatology');

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
        Schema::dropIfExists('antecedentes');
    }
}
