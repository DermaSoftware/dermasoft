<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHcconsentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hcconsent', function (Blueprint $table) {
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
			
			$table->unsignedBigInteger('consent')->default(0);//Consentimiento
			$table->foreign('consent')->references('id')->on('consents');
			$table->text('note')->nullable();//Contenido
			$table->text('comments')->nullable();//Observaciones adicionales
			$table->unsignedBigInteger('doctor')->default(0);//Médico
			$table->foreign('doctor')->references('id')->on('users');
			$table->string('tag')->nullable();//Tipo de procedimiento
			$table->string('hc_type')->nullable();//Tipo de procedimiento
			$table->string('patient_authorization')->nullable();//Autorización del paciente
			$table->string('authorization')->nullable();//
			//Manifiesto que, habiendo recibido la información relacionada con el procedimiento, he decidido dar mi consentimiento
			//Manifiesto que habiendo recibido la información relacionada con el procedimiento, he decidido NO dar mi consentimiento
			$table->text('signature')->nullable();//Firma paciente
			$table->text('signature_pp')->nullable();//Firma paciente
			$table->text('path_pdf')->nullable();//
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
        Schema::dropIfExists('hcconsent');
    }
}
