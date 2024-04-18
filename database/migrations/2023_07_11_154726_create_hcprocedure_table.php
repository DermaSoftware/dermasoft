<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHcprocedureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hcprocedure', function (Blueprint $table) {
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
        Schema::dropIfExists('hcprocedure');
    }
}
