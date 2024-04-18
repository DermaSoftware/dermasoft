<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnsTablePlans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->string('validity')->default('Mensual');//Vigencia (mensual-anual) renovable con pago -emitir alertas para pago
            $table->integer(('email_count_smtp'))->default(0);//Capacidad de mensajes SMTP (cantidad de correos, ejem 1000 Correos)
            $table->boolean(('rtc_protocol'))->default(TRUE);//Uso de protocolo web RTC para interconsulta (SI-NO)
            $table->string(('sequrity_backup'))->default('mensual');//Back up de seguridad (mensual-semanal-cada 3 dias- diario)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
