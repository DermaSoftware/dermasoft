<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CeateHtreatmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('htreatment', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->id();
			$table->uuid('uuid')->unique();
			$table->unsignedBigInteger('hprocedure_id')->default(0);//Procedimiento
			$table->foreign('hprocedure_id')->references('id')->on('hprocedure');
			$table->unsignedBigInteger('user')->default(0);//Paciente
			$table->foreign('user')->references('id')->on('users');
			$table->unsignedBigInteger('doctor')->default(0);//Doctor
			$table->foreign('doctor')->references('id')->on('users');
			//Tratamiento
			$table->string('muscle')->nullable();//Músculo
			$table->integer('units')->nullable();//Unidades administradas

            $table->string('product_dates')->nullable();//Datos del producto
			$table->string('product_name')->nullable();//Nombre del producto
			$table->string('lot')->nullable();//Lote No.
			$table->string('dilution')->nullable();//Dilución
			$table->string('injectable')->nullable();//Concentración de inyectable
			$table->integer('total')->nullable();//Total unidades administradas
			$table->string('status')->default('active');
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
        //
    }
}
