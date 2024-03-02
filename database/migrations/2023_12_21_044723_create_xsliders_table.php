<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXslidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $connection = Schema::connection('mysql');
        $exist_table = $connection->hasTable("xsliders");
        if (!$exist_table)
            Schema::create('xsliders', function (Blueprint $table) {
                $table->id();
                $table->uuid('uuid')->unique();//
                $table->unsignedBigInteger('user')->default(0);//Creada por
                $table->foreign('user')->references('id')->on('users');
                $table->string('name')->nullable();//
                $table->text('url')->nullable();//
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
        Schema::dropIfExists('xsliders');
    }
}
