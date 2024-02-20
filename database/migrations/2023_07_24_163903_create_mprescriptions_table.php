<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMprescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mprescriptions', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();//
			$table->unsignedBigInteger('mp')->default(0);//
			$table->foreign('mp')->references('id')->on('medicalp');
			$table->text('medicine')->nullable();//Medicamento
			$table->string('dose')->nullable();//Dosis
			$table->string('frequency')->nullable();//Frecuencia
			$table->string('route_administration')->nullable();//Vía de administración
			$table->string('duration')->nullable();//Duración
			$table->text('indications')->nullable();//Indicaciones
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
        Schema::dropIfExists('mprescriptions');
    }
}
