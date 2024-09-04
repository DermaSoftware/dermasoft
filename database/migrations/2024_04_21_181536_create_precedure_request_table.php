<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrecedureRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedure_request', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->id();
            $table->uuid('uuid')->unique();

            $table->unsignedBigInteger('doctor')->default(0);//Doctor
			$table->foreign('doctor')->references('id')->on('users');

			$table->unsignedBigInteger('hcdermdiagnostics_id')->default(0);//Paciente
			$table->foreign('hcdermdiagnostics_id')->references('id')->on('hcdermdiagnostics');

            $table->unsignedBigInteger('appointments_id')->default(0);//Consulta
			$table->foreign('appointments_id')->references('id')->on('appointments');

			$table->unsignedBigInteger('dermatology_id')->default(0);//Paciente
			$table->foreign('dermatology_id')->references('id')->on('dermatology');

            $table->string('status')->default('active');

            $table->text('note')->nullable();
            $table->timestamps();
        });

        Schema::create('prequest_nprocedure', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->id();
            $table->uuid('uuid')->unique();

            $table->unsignedBigInteger('procedure_request_id')->default(0);//Solicitud de procedimiento
			$table->foreign('procedure_request_id')->references('id')->on('procedure_request');

			$table->unsignedBigInteger('procedures_id')->default(0);// Nomenclador de procedimientos definidos
			$table->foreign('procedures_id')->references('id')->on('procedures');

            $table->timestamps();
        });
        Schema::table('hprocedure', function (Blueprint $table) {
            $table->dropColumn('diagnostic_id');
        });
        Schema::table('hprocedure', function (Blueprint $table) {
            $table->unsignedBigInteger('procedure_request_id')->default(0);//Doctor
			$table->foreign('procedure_request_id')->references('id')->on('procedure_request');
        });

        //// Prescripcion medica ////////////////
        Schema::create('prescription', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->uuid('uuid')->unique();//
            $table->id();
			$table->unsignedBigInteger('doctor')->default(0);//Doctor
			$table->foreign('doctor')->references('id')->on('users');

            $table->unsignedBigInteger('dermatology_id')->default(0);//Historia clinica
			$table->foreign('dermatology_id')->references('id')->on('dermatology');

            $table->unsignedBigInteger('appointments_id')->default(0);//Consulta
			$table->foreign('appointments_id')->references('id')->on('appointments');

			$table->integer('validity')->default(1);//vigencia
			$table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('prescription_medicine', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->uuid('uuid')->unique();//
            $table->id();
			$table->unsignedBigInteger('prescription_id')->default(0);//Prescipcion medica
			$table->foreign('prescription_id')->references('id')->on('prescription');

            $table->unsignedBigInteger('medicines_id')->default(0);//Medicamento
			$table->foreign('medicines_id')->references('id')->on('medicines');

			$table->string('medicine_name')->nullable();//Medicamento
			$table->string('dose')->nullable();//Dosis
			$table->string('frequency')->nullable();//Frecuencia
			$table->string('route_administration')->nullable();//Vía de administración
			$table->string('duration')->nullable();//Duración
			$table->text('indications')->nullable();//Indicaciones
			$table->string('status')->default('active');
            $table->timestamps();
        });

        //// Solcitud de examen ////////////////
        Schema::create('exam_request', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->id();
            $table->uuid('uuid')->unique();

            $table->unsignedBigInteger('doctor')->default(0);//Doctor
			$table->foreign('doctor')->references('id')->on('users');

			$table->unsignedBigInteger('hcdermdiagnostics_id')->default(0);//Paciente
			$table->foreign('hcdermdiagnostics_id')->references('id')->on('hcdermdiagnostics');

			$table->unsignedBigInteger('dermatology_id')->default(0);//Paciente
			$table->foreign('dermatology_id')->references('id')->on('dermatology');

            $table->unsignedBigInteger('appointments_id')->default(0);//Consulta
			$table->foreign('appointments_id')->references('id')->on('appointments');

            $table->string('status')->default('active');

            $table->integer('total')->default(0);//
            $table->timestamps();
        });

        Schema::create('rexam_laboratoryexams', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->id();
            $table->uuid('uuid')->unique();

            $table->unsignedBigInteger('exam_request_id')->default(0);//Solicitud de examen
			$table->foreign('exam_request_id')->references('id')->on('exam_request');

			$table->unsignedBigInteger('laboratoryexams_id')->default(0);// Examen de laboratorio
			$table->foreign('laboratoryexams_id')->references('id')->on('laboratoryexams');

            $table->timestamps();
        });

        //// Solcitud de patologia ////////////////
        Schema::create('patology_request', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->id();
            $table->uuid('uuid')->unique();

            $table->unsignedBigInteger('doctor')->default(0);//Doctor
			$table->foreign('doctor')->references('id')->on('users');

			$table->unsignedBigInteger('hcdermdiagnostics_id')->default(0);//Paciente
			$table->foreign('hcdermdiagnostics_id')->references('id')->on('hcdermdiagnostics');

			$table->unsignedBigInteger('dermatology_id')->default(0);//Paciente
			$table->foreign('dermatology_id')->references('id')->on('dermatology');

            $table->unsignedBigInteger('appointments_id')->default(0);//Consulta
			$table->foreign('appointments_id')->references('id')->on('appointments');

            $table->string('status')->default('active');

            $table->text('annexes')->nullable();//Observaciones y/o anexos
            $table->timestamps();
        });

        Schema::create('patology_request_pathologies', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->id();
            $table->uuid('uuid')->unique();

            $table->unsignedBigInteger('patology_request_id')->default(0);//Solicitud de examen
			$table->foreign('patology_request_id')->references('id')->on('patology_request');

			$table->unsignedBigInteger('pathologies_id')->default(0);// Examen de laboratorio
			$table->foreign('pathologies_id')->references('id')->on('pathologies');

            $table->string('code')->nullable();//Código
			$table->string('pathologie')->nullable();//Patología
			$table->text('note')->nullable();//Origen de la muestra
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
        Schema::dropIfExists('precedure_request');
    }
}
