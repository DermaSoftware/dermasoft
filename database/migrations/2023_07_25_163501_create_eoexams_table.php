<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEoexamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eoexams', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();//
			$table->unsignedBigInteger('eo')->default(0);//
			$table->foreign('eo')->references('id')->on('examorders');
			$table->string('name')->nullable();//
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
        Schema::dropIfExists('eoexams');
    }
}
