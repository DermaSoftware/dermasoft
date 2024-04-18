<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHclesionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hclesion', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();
			$table->unsignedBigInteger('hc')->default(0);//HC
			$table->foreign('hc')->references('id')->on('dermatology');
			$table->unsignedBigInteger('user')->default(0);//Paciente
			$table->foreign('user')->references('id')->on('users');
			$table->unsignedBigInteger('company')->default(0);//
			$table->foreign('company')->references('id')->on('companies');
			$table->unsignedBigInteger('campus')->default(0);//Sede
			$table->foreign('campus')->references('id')->on('headquarters');
			
			$table->string('lesion')->nullable();//Ubicación de la lesión
			$table->string('body_area')->nullable();//Área corporal
			
			$table->string('disinfection')->nullable();//Desinfección
			$table->string('antiseptic')->nullable();//Antiséptico
			$table->string('anesthesia')->nullable();//Anestésia
			$table->string('type_anesthesia')->nullable();//Tipo anestésia
			$table->string('other_anesthesia')->nullable();//Otro
			$table->string('freeze_time_1')->nullable();//Tiempo 1 de congelación
			$table->string('freeze_time_2')->nullable();//Tiempo 2 de congelación
			$table->string('defrost_time_1')->nullable();//Tiempo 1 de descongelación
			$table->string('defrost_time_2')->nullable();//Tiempo 2 de descongelación
			$table->string('timex')->nullable();//Tiempos (1Ciclo, 2Ciclo)
			$table->string('technique')->nullable();//Técnica
			$table->string('other_technique')->nullable();//Cual
			
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
        Schema::dropIfExists('hclesion');
    }
}
