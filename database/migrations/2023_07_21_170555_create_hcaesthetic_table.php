<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHcaestheticTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hcaesthetic', function (Blueprint $table) {
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
			
			$table->string('product_dates')->nullable();//Datos del producto
			$table->string('product_name')->nullable();//Nombre del producto
			$table->string('lot')->nullable();//Lote No.
			$table->string('dilution')->nullable();//Dilución
			$table->string('injectable')->nullable();//Concentración de inyectable
			$table->integer('total')->nullable();//Total unidades administradas
			$table->string('complications')->nullable();//Complicaciones
			$table->text('record_complications')->nullable();//Registro de complicaciones
			$table->text('participants')->nullable();//Participantes
			$table->text('comments')->nullable();//Comentarios
			
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
        Schema::dropIfExists('hcaesthetic');
    }
}
