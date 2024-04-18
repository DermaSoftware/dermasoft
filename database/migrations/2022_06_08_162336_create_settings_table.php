<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();
			$table->integer('hours_quotes')->default(1);//Cantidad de horas que tiene el paciente antes de la cita para pagar la consulta
			$table->integer('hours_scheduling_web')->default(1);//Cantidad de horas antes para notificar recordatorio de pago de consulta cuando se toma cita por la web
			$table->integer('time_consultation')->default(1);//Tiempo de duración de consulta
			$table->string('time_consultation_text')->default('20 minutos');//Tiempo de duración de consulta
			$table->integer('hours_ntf')->default(1);//Cantidad de horas antes para notificar recordatorio de cita por whatsapp, correo electrónico y mini mensaje de texto
			$table->text('logo')->nullable();
			
			$table->text('epaycokey')->nullable();//
			$table->string('epaycoidc', 10)->nullable();//
			$table->text('epaycopri')->nullable();//
			$table->text('chat')->nullable();//
			$table->text('whatsapp')->nullable();//
			$table->text('video')->nullable();//
			
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
        Schema::dropIfExists('settings');
    }
}
