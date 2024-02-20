<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVitalsignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vitalsigns', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();//
			$table->unsignedBigInteger('user')->default(0);//
			$table->foreign('user')->references('id')->on('users');
			$table->unsignedBigInteger('company')->default(0);//
			$table->foreign('company')->references('id')->on('companies');
			$table->unsignedBigInteger('campus')->default(0);//Sede
			$table->foreign('campus')->references('id')->on('headquarters');
			
			$table->string('heart_rate')->nullable();//Frecuencia cardiaca
			$table->string('breathing_frequency')->nullable();//Frecuencia respiratoria
			$table->string('weight')->nullable();//Peso
			$table->string('blood_pressure')->nullable();//Tensión arterial
			$table->string('temperature')->nullable();//Temperatura
			$table->string('saturation')->nullable();//Saturación
			$table->unsignedBigInteger('querytype')->default(0);//Tipo de consulta
			$table->foreign('querytype')->references('id')->on('querytypes');
			$table->text('note')->nullable();//Observaciones
			
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
        Schema::dropIfExists('vitalsigns');
    }
}
