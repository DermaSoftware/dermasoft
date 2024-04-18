<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHcclitemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hcclitem', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();
			$table->unsignedBigInteger('checklist')->default(0);//checklist
			$table->foreign('checklist')->references('id')->on('hcchecklist');
			$table->text('description')->nullable();//
			$table->string('applicability')->nullable();//aplicabilidad
			$table->text('comments')->nullable();//Observaciones
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
        Schema::dropIfExists('hcclitem');
    }
}
