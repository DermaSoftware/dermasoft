<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteColumnsTablePlans2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('amount_mini_text');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('price_mini_text');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('price_medical');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('price_hours');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('price_venues');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('price_users_admin');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('allow_hours');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('allowed_payments');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('allowed_inventories_billing');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('allowed_emailing');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('allowed_email_quotes');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('allowed_scheduling_web');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('allowed_medical_whatsapp');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('allow_patient_quotes');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('allow_special_whatsapp');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('allow_special_messages');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('allow_whatsapp_reminder');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('allow_mini_text');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('allow_whatsapp');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('allow_generate_consent');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('allowed_medical_prescription');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('allowed_logo');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('voice_transcription');
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
