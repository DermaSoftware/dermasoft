<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHctreatmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hctreatment', function (Blueprint $table) {
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
			//Tratamiento
			$table->string('muscle')->nullable();//Músculo
			$table->integer('units')->nullable();//Unidades administradas
			
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
        Schema::dropIfExists('hctreatment');
    }
}
