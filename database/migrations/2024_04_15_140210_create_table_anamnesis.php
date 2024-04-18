<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAnamnesis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anamnesis', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->text('reason')->nullable();//Motivo de la consulta
			$table->text('current_illness')->nullable();//Enfermedad actual
			$table->text('physical_exam')->nullable();//Examen físico
			$table->text('analysis')->nullable();//Análisis y/u observaciones
			$table->text('medical_history')->nullable();//Antecedentes médicos
			$table->text('surgical_history')->nullable();//Antecedentes quirúrgicos
			$table->text('allergic_history')->nullable();//Antecedentes alérgicos
			$table->text('drug_history')->nullable();//Antecedentes farmacológicos
			$table->text('family_history')->nullable();//Antecedentes familiares
			$table->text('other_history')->nullable();//Otros antecedentes
            $table->text('evoluction')->nullable();
            $table->text('system_revition')->nullable();
            $table->boolean('is_control')->default(false);

            $table->unsignedBigInteger('appointments_id')->default(0);//Procedimiento
			$table->foreign('appointments_id')->references('id')->on('appointments');

            $table->unsignedBigInteger('dermatology_id')->default(0);//Procedimiento
			$table->foreign('dermatology_id')->references('id')->on('dermatology');

            $table->unsignedBigInteger('doctor')->default(0);//Doctor
			$table->foreign('doctor')->references('id')->on('users');

            $table->id();
            $table->timestamps();
        });

        Schema::create('appointment_reason', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->text('external_cause')->nullable();//Motivo de la consulta
			$table->text('consultation_purpose')->nullable();//Enfermedad actual

            $table->unsignedBigInteger('appointments_id')->default(0);//Procedimiento
			$table->foreign('appointments_id')->references('id')->on('appointments');

            $table->unsignedBigInteger('dermatology_id')->default(0);//Procedimiento
			$table->foreign('dermatology_id')->references('id')->on('dermatology');

            $table->unsignedBigInteger('doctor')->default(0);//Doctor
			$table->foreign('doctor')->references('id')->on('users');

            $table->id();
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
        Schema::dropIfExists('table_anamnesis');
    }
}
