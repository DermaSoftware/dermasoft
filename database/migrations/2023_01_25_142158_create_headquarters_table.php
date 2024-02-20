<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadquartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headquarters', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();
			$table->string('name');
			$table->string('code');
			$table->text('address')->nullable();
			$table->string('city');
			$table->string('phone');
			$table->string('email');
			$table->string('responsible');
			$table->string('responsible_phone');
			$table->string('responsible_email');
			$table->unsignedBigInteger('position')->default(0);//Cargo
			$table->foreign('position')->references('id')->on('charges');
			$table->unsignedBigInteger('company')->default(0);//Empresa
			$table->foreign('company')->references('id')->on('companies');
			$table->string('state')->default('activo');
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
        Schema::dropIfExists('headquarters');
    }
}
