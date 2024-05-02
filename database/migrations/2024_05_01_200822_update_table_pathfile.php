<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTablePathfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('procedure_request', function (Blueprint $table) {
            $table->string('path_pdf')->nullable();
        });
        Schema::table('prescription', function (Blueprint $table) {
            $table->string('path_pdf')->nullable();
        });
        Schema::table('exam_request', function (Blueprint $table) {
            $table->string('path_pdf')->nullable();
        });
        Schema::table('patology_request', function (Blueprint $table) {
            $table->string('path_pdf')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
