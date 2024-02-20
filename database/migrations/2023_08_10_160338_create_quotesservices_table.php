<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotesservices', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();//
			$table->unsignedBigInteger('quote')->default(0);//Factura
			$table->foreign('quote')->references('id')->on('quotes');
			$table->unsignedBigInteger('service')->default(0);//Servicio
			$table->foreign('service')->references('id')->on('services');
			$table->float('price', 18, 2)->default(0);//Precio
			$table->integer('amount')->default(0);//Cantidad
			$table->float('total', 18, 2)->default(0);//Precio
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
        Schema::dropIfExists('quotesservices');
    }
}
