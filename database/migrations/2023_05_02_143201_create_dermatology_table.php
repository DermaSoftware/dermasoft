<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDermatologyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dermatology', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();//
			$table->unsignedBigInteger('user')->default(0);//
			$table->foreign('user')->references('id')->on('users');
			$table->unsignedBigInteger('doctor')->default(0);//médico
			$table->foreign('doctor')->references('id')->on('users');
			$table->unsignedBigInteger('company')->default(0);//
			$table->foreign('company')->references('id')->on('companies');
			$table->unsignedBigInteger('campus')->default(0);//Sede
			$table->foreign('campus')->references('id')->on('headquarters');
			$table->string('external_cause')->nullable();//Causa externa
			$table->string('consultation_purpose')->nullable();//Finalidad consulta
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
			$table->text('path_pdf')->nullable();//
			$table->string('hc_type')->default('Dermatología general');
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
        Schema::dropIfExists('dermatology');
    }
}
