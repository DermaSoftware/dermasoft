<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();
            $table->string('name');
			$table->string('subtitle')->nullable();
			$table->float('price', 18, 2)->default(0);//
			$table->integer('month')->default(1);//Duración en meses
			$table->text('photo')->nullable();
			$table->text('description')->nullable();
			$table->string('state')->default('active');//Estado
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
        Schema::dropIfExists('memberships');
    }
}
