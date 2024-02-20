<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
			$table->string('password');
			$fields = ['scd_name','scd_lastname','birth','gender','civil_status','blood_type','vital_state','contact','fix_phone','phone','main_address','secondary_address','country','department','city','social_security','affiliate_type','affiliate_type_ssg','education','ethnic_group','population_group','occupation','eps','date_affiliation','prepaid','benefits_plan','health_care','notes','contract_number','occupational_hazards','pension_funds','attendant','name_attendant','relationship','fix_phone_attendant','phone_attendant'];
			foreach($fields as $row){
				$table->string($row)->nullable();
			}
			$table->string('document_type')->nullable();//Tipo de documento(cedula de ciudadanía, pasaporte, cedula de extranjería)
			$table->string('document_number')->nullable();//Número de documento
			$table->string('landline')->nullable();//Teléfono fijo
			$table->string('regime')->nullable();//Régimen
			$table->string('stratum')->nullable();//Estrato
			$table->string('professional_card')->nullable();//Tarjeta profesional
			$table->unsignedBigInteger('charge')->default(0);//Cargo
			$table->foreign('charge')->references('id')->on('charges');
			$table->unsignedBigInteger('specialty')->default(0);//Especialidad
			$table->foreign('specialty')->references('id')->on('specialties');
			$table->unsignedBigInteger('campus')->default(0);//Sede
			$table->foreign('campus')->references('id')->on('headquarters');
			$table->unsignedBigInteger('company')->default(0);//Empresa
			$table->foreign('company')->references('id')->on('companies');
			$table->text('photo')->nullable();
			$table->text('photo_pp')->nullable();
			$table->text('signature')->nullable();
			$table->text('signature_pp')->nullable();
			$table->text('accept_habeas')->nullable();
			$table->unsignedBigInteger('role')->default(2);//Administrador,...
			$table->foreign('role')->references('id')->on('roles');
			$table->string('habeas', 20)->default('no');//habeas data
			$table->string('twofa')->default('not');//two factor
            $table->string('modeswitch')->default('light');//light,dark
            $table->string('status')->default('active');
            $table->rememberToken();
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
        if (Schema::hasTable('users')) {
			Schema::table('users', function (Blueprint $table) {
				$table->dropForeign(['role']);
			});
		}
		Schema::dropIfExists('users');
    }
}
