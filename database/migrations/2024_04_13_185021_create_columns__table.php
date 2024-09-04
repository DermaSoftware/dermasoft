<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hcdermdiagnostics', function (Blueprint $table) {
            $table->string('hc_type')->nullable()->default('Dermatología general'); // Pra especificar el tipo de consulta
            $table->unsignedBigInteger('doctor')->default(0);//Doctor
			$table->foreign('doctor')->references('id')->on('users');
        });
        Schema::table('hcdermindications', function (Blueprint $table) {
            $table->string('hc_type')->nullable()->default('Dermatología general'); // Pra especificar el tipo de consulta
            $table->unsignedBigInteger('doctor')->default(0);//Doctor
			$table->foreign('user')->references('id')->on('users');
        });
        Schema::table('antecedentes', function (Blueprint $table) {
            $table->string('hc_type')->nullable()->default('Dermatología general');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('columns_');
    }
}
