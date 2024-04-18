<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHprocedureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hprocedure', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->id();
			$table->uuid('uuid')->unique();
			$table->unsignedBigInteger('hc')->default(0);//HC
			$table->foreign('hc')->references('id')->on('dermatology');
			$table->unsignedBigInteger('user')->default(0);//Paciente
			$table->foreign('user')->references('id')->on('users');
			$table->unsignedBigInteger('doctor')->default(0);//Doctor
			$table->foreign('doctor')->references('id')->on('users');

			$table->unsignedBigInteger('type_procedure')->default(0);//Tipo de procedimiento
			$table->foreign('type_procedure')->references('id')->on('procedures');
			$table->string('other_procedure')->nullable();
			$table->string('disinfection')->nullable();//desinfección
			$table->string('antiseptic')->nullable();//antiséptico
			$table->string('anesthesia')->nullable();//anestésia
			$table->string('type_anesthesia')->nullable();//tipo anestésia
			$table->string('other_anesthesia')->nullable();//otro
			$table->string('hemostasis')->nullable();//Hemostasia
			$table->string('other_hemostasis')->nullable();//otro
			$table->string('procedure_time')->nullable();//tiempo del procedimiento
			$table->string('complications')->nullable();//complicaciones
			$table->text('record_complications')->nullable();//registro de complicaciones
			$table->text('participants')->nullable();//participantes
			$table->text('comments')->nullable();//comentarios

			$table->string('biopsy_method')->nullable();//método de biopsia
			$table->string('other_biopsy_method')->nullable();//otro
			$table->string('biopsy_type')->nullable();//tipo de biopsia
			$table->string('required_margin')->nullable();//requirió margen
			$table->string('how_much')->nullable();//cuanto
			$table->string('body_area')->nullable();//área corporal
			$table->string('body_area_other')->nullable();//área corporal

            // Campos especificos para crioterapia
            $table->string('hc_type')->nullable()->default('Dermatología general'); // Pra especificar el tipo de consulta
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
        Schema::dropIfExists('hprocedure');
    }
}
