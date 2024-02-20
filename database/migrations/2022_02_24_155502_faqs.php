<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Faqs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catfaqs', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();
            $table->string('name')->nullable();
			$table->string('status')->default('active');
            $table->timestamps();
        });
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();
			$table->unsignedBigInteger('catfaq')->default(0);
			$table->foreign('catfaq')->references('id')->on('catfaqs');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('catfaqs');
        Schema::dropIfExists('faqs');
    }
}
