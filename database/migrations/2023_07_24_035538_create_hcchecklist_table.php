<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHcchecklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hcchecklist', function (Blueprint $table) {
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
			
			$table->unsignedBigInteger('doctor')->default(0);//Médico
			$table->foreign('doctor')->references('id')->on('users');
			$table->unsignedBigInteger('created_by')->default(0);//Quien diligencio el formulario
			$table->foreign('created_by')->references('id')->on('users');
			$table->string('tag')->nullable();//Tipo de procedimiento
			$table->string('hc_type')->nullable();//Tipo de procedimiento
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
        Schema::dropIfExists('hcchecklist');
    }
}
