<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHcsutureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hcsuture', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();//
			$table->unsignedBigInteger('hc')->default(0);//HC dermatology
			$table->foreign('hc')->references('id')->on('dermatology');
			$table->unsignedBigInteger('user')->default(0);//Paciente
			$table->foreign('user')->references('id')->on('users');
			$table->unsignedBigInteger('company')->default(0);//
			$table->foreign('company')->references('id')->on('companies');
			$table->unsignedBigInteger('campus')->default(0);//Sede
			$table->foreign('campus')->references('id')->on('headquarters');
			$table->string('suture_type')->nullable();//tipo de sutura
			$table->string('caliber')->nullable();//calibre
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
        Schema::dropIfExists('hcsuture');
    }
}
