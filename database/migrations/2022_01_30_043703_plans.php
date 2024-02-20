<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Plans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();
            $table->string('name');
			$table->string('subtitle')->nullable();
			$table->float('price', 18, 2)->default(0);//
			$table->integer('month')->default(1);//Duración en meses
			$table->text('photo')->nullable();
			$table->text('description')->nullable();
			
			$table->integer('days')->default(1);//Duración en dias para suspender servicio
			$table->integer('allowed_patients')->default(0);//Pacientes permitidos
			$table->integer('storage_capacity')->default(0);//Capacidad de almacenamiento
			$table->integer('users_admin')->default(0);//Cantidad de usuarios rol ADMINISTRATIVO habilitado por sede
			$table->string('voice_transcription')->default('no');//Transcripción de voz
			$table->string('allowed_logo')->default('no');//Permitir uso de logo del cliente administrador
			$table->integer('venues')->default(0);//Cantidad de sedes habilitadas
			$table->integer('users_medical')->default(0);//Cantidad de usuarios rol MEDICO
			$table->string('allowed_medical_prescription')->default('no');//Permitir envío de prescripción médica al correo electrónico del paciente
			$table->string('allow_generate_consent')->default('no');//Permitir generar consentimiento informado de manera digita
			$table->string('allow_whatsapp')->default('no');//Permitir notificación de citas por WhatsApp
			$table->string('allow_mini_text')->default('no');//Permitir notificación de citas por mini mensaje de texto
			$table->string('allow_whatsapp_reminder')->default('no');//Permitir recordatorio de citas por WhatsApp
			$table->integer('mini_text')->default(0);//Cantidad de mini mensajes de texto permitidos
			$table->string('allow_special_messages')->default('no');//Permitir envío de mensajes fechas especiales a pacientes por correo electrónico
			$table->string('allow_special_whatsapp')->default('no');//Permitir envío de mensajes fechas especiales a pacientes por whatsapp
			$table->string('allow_patient_quotes')->default('no');//Permitir cotizaciones para el paciente
			$table->string('allowed_medical_whatsapp')->default('no');//Permitir envío de prescripción médica whatsapp del paciente
			$table->string('allowed_scheduling_web')->default('no');//Permitir agendamiento de citas desde la web
			$table->string('allowed_email_quotes')->default('no');//Permitir notificación de citas por correo electrónico
			$table->string('allowed_emailing')->default('no');//Permitir Emailing promocional
			$table->string('allowed_inventories_billing')->default('no');//Permitir uso del módulo inventarios y facturación
			$table->string('allowed_payments')->default('no');//Permitir integración con pasarela de pagos
			
			$table->integer('allow_hours')->default(0);//Cantidad de horas permitidas para video consulta
			$table->float('price_storage_capacity', 18, 2)->default(0);//Costo adicional por capacidad de almacenamiento por GB en el servidor
			$table->float('price_users_admin', 18, 2)->default(0);//Costo adicional por usuario administrativo
			$table->float('price_hours', 18, 2)->default(0);//Costo adicional por hora de video consulta
			$table->float('price_venues', 18, 2)->default(0);//Costo adicional por sede
			$table->float('price_medical', 18, 2)->default(0);//Costo adicional por usuario medico
			$table->float('price_mini_text', 18, 2)->default(0);//Costo adicional por paquete de mini mensajes de texto
			$table->integer('amount_mini_text')->default(0);//Cantidad de mensajes de texto
			$table->string('state')->default('active');//Estado
			
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
        Schema::dropIfExists('plans');
    }
}
