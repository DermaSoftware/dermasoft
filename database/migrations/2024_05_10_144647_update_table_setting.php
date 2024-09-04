<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('document_number_required')->nullable();
            $table->string('document_number_active')->nullable();
            $table->string('document_type_required')->nullable();
            $table->string('document_type_active')->nullable();
            $table->string('stratum_required')->nullable();
            $table->string('stratum_active')->nullable();
            $table->string('signature_required')->nullable();
            $table->string('signature_active')->nullable();
            $table->string('regime_active')->nullable();//Régimen
            $table->string('regime_required')->nullable();//Régimen

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
