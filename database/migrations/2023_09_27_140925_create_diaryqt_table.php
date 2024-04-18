<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaryqtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diaryqt', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('diary_id')->default(0);//
			$table->foreign('diary_id')->references('id')->on('diary');
			$table->unsignedBigInteger('qt_id')->default(0);//
			$table->foreign('qt_id')->references('id')->on('querytypes');
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
        Schema::dropIfExists('diaryqt');
    }
}
