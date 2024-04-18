<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMattachsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mattachs', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();//
			$table->unsignedBigInteger('mail_id')->default(0);//
			$table->foreign('mail_id')->references('id')->on('logmails');
			$table->text('path_attach')->nullable();//
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
        Schema::dropIfExists('mattachs');
    }
}
