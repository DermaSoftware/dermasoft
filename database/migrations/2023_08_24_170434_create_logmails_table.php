<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logmails', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();//
			$table->unsignedBigInteger('user')->default(0);//Creado por
			$table->foreign('user')->references('id')->on('users');
			$table->unsignedBigInteger('user_id')->default(0);//Para user especifico
			$table->foreign('user_id')->references('id')->on('users');
			$table->unsignedBigInteger('company')->default(0);//
			$table->foreign('company')->references('id')->on('companies');
			$table->unsignedBigInteger('campus')->default(0);//Sede
			$table->foreign('campus')->references('id')->on('headquarters');
			$table->unsignedBigInteger('tpl_id')->default(0);//Plantilla
			$table->foreign('tpl_id')->references('id')->on('tplmails');
			$table->string('is_whatsapp')->default('no');//
			$table->string('is_email_text')->default('no');//
			$table->string('is_marketing')->default('no');//
			$table->string('is_sms')->default('no');//
			
			$table->text('subject')->nullable();//
			$table->text('msj')->nullable();//
			$table->string('is_attach')->default('no');//
			
			$table->string('is_programmed')->default('no');//
			$table->string('date_programmed')->nullable();//
			
			$table->string('is_diagnostic')->default('no');//
			$table->unsignedBigInteger('diagnostic')->default(0);//
			$table->foreign('diagnostic')->references('id')->on('diagnoses');
			$table->string('name_event')->nullable();//
			
			$table->string('sel_users')->default('Todos');//
			$table->string('sel_gender')->default('Todos');//Masculino,Femenino
			
			$table->string('state')->default('Enviado');//Enviado, Error, Programado
			
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
        Schema::dropIfExists('logmails');
    }
}
