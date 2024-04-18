<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //AGENDA DE MEDICO
		Schema::create('diary', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();//
			$table->unsignedBigInteger('user')->default(0);//Doctor
			$table->foreign('user')->references('id')->on('users');
			$table->unsignedBigInteger('company')->default(0);//
			$table->foreign('company')->references('id')->on('companies');
			
			$table->string('day1')->default('yes');//Lunes
			$table->unsignedBigInteger('campus1')->default(0);//Sede
			$table->foreign('campus1')->references('id')->on('headquarters');
			$table->string('time_init1')->nullable();//Hora
			$table->string('time_end1')->nullable();//Hora
			$table->string('modality1')->nullable();//Modalidad
			
			$table->string('day2')->default('yes');//Martes
			$table->unsignedBigInteger('campus2')->default(0);//Sede
			$table->foreign('campus2')->references('id')->on('headquarters');
			$table->string('time_init2')->nullable();//Hora
			$table->string('time_end2')->nullable();//Hora
			$table->string('modality2')->nullable();//Modalidad
			
			$table->string('day3')->default('yes');//Miercoles
			$table->unsignedBigInteger('campus3')->default(0);//Sede
			$table->foreign('campus3')->references('id')->on('headquarters');
			$table->string('time_init3')->nullable();//Hora
			$table->string('time_end3')->nullable();//Hora
			$table->string('modality3')->nullable();//Modalidad
			
			$table->string('day4')->default('yes');//Jueves
			$table->unsignedBigInteger('campus4')->default(0);//Sede
			$table->foreign('campus4')->references('id')->on('headquarters');
			$table->string('time_init4')->nullable();//Hora
			$table->string('time_end4')->nullable();//Hora
			$table->string('modality4')->nullable();//Modalidad
			
			$table->string('day5')->default('yes');//Viernes
			$table->unsignedBigInteger('campus5')->default(0);//Sede
			$table->foreign('campus5')->references('id')->on('headquarters');
			$table->string('time_init5')->nullable();//Hora
			$table->string('time_end5')->nullable();//Hora
			$table->string('modality5')->nullable();//Modalidad
			
			$table->string('day6')->default('not');//Sabado
			$table->unsignedBigInteger('campus6')->default(0);//Sede
			$table->foreign('campus6')->references('id')->on('headquarters');
			$table->string('time_init6')->nullable();//Hora
			$table->string('time_end6')->nullable();//Hora
			$table->string('modality6')->nullable();//Modalidad
			
			$table->string('day7')->default('not');//Domingo
			$table->unsignedBigInteger('campus7')->default(0);//Sede
			$table->foreign('campus7')->references('id')->on('headquarters');
			$table->string('time_init7')->nullable();//Hora
			$table->string('time_end7')->nullable();//Hora
			$table->string('modality7')->nullable();//Modalidad
			
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
        Schema::dropIfExists('diary');
    }
}
