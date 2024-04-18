<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitude', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();//
			$table->unsignedBigInteger('user')->default(0);//Paciente
			$table->foreign('user')->references('id')->on('users');
			$table->unsignedBigInteger('company')->default(0);//
			$table->foreign('company')->references('id')->on('companies');
			$table->unsignedBigInteger('campus')->default(0);//Sede
			$table->foreign('campus')->references('id')->on('headquarters');
			$table->unsignedBigInteger('doctor')->default(0);//Doctor
			$table->foreign('doctor')->references('id')->on('users');
			
			$table->unsignedBigInteger('qt_id')->default(0);//Tipo de consulta
			$table->foreign('qt_id')->references('id')->on('querytypes');
			$table->string('query_type')->nullable();//Tipo de consulta
			$table->string('modality')->nullable();//Modalidad
			$table->string('date_quote')->nullable();//Fecha
			$table->string('time_quote')->nullable();//Hora
			$table->text('note')->nullable();//
			$table->string('status')->default('active');//finalized
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
        Schema::dropIfExists('solicitude');
    }
}
