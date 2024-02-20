<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();
			$table->unsignedBigInteger('user')->default(0);//Usuario
			$table->foreign('user')->references('id')->on('users');
			$table->unsignedBigInteger('plan')->default(0);//Plan
			$table->foreign('plan')->references('id')->on('plans');
			$table->unsignedBigInteger('company')->default(0);//Empresa
			$table->foreign('company')->references('id')->on('companies');
			$table->string('invoice')->nullable();//Transacción
			$table->float('amount', 18, 2)->default(0);//Monto
			$table->string('type_pay')->default('Plan');//Plan
			$table->string('currency')->nullable();//
			$table->string('response')->nullable();//
			$table->string('franchise')->nullable();//
			$table->string('date_init')->nullable();//
			$table->string('expiration')->nullable();//
			$table->text('description')->nullable();//
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
        Schema::dropIfExists('payments');
    }
}
