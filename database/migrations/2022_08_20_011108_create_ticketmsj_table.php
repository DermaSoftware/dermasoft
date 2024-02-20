<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketmsjTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticketmsj', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();
			$table->unsignedBigInteger('user')->default(0);
			$table->foreign('user')->references('id')->on('users');
			$table->unsignedBigInteger('ticket')->default(0);
			$table->foreign('ticket')->references('id')->on('ticket');
			$table->string('date_init')->nullable();//Fecha
			$table->string('title')->nullable();//Nombre
			$table->text('description')->nullable();//Descripción
			$table->text('file')->nullable();//Archivo
			$table->string('typemsj')->default('Cliente');
			$table->string('status')->default('Nuevo');
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
        Schema::dropIfExists('ticketmsj');
    }
}
