<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();
			$table->unsignedBigInteger('user')->default(0);//Usuario
			$table->foreign('user')->references('id')->on('users');
			$table->string('name');
			$table->string('nit')->nullable();
			$table->text('location')->nullable();//
			$table->string('phone')->nullable();
			$table->text('logo')->nullable();//
			$table->text('logo_pp')->nullable();//
			$table->string('email')->nullable();

			$table->string('kind_person')->nullable();//Tipo de persona(natural,jurídica)
			$table->string('legal_representative')->nullable();//Representante legal
			$table->string('city')->nullable();//Ciudad
			$table->string('contact_name')->nullable();//Nombre de contacto

			//Configuraciones
			$fields = ['name','scd_name','lastname','scd_lastname','birth','gender','civil_status','blood_type','vital_state','contact','fix_phone','phone','campus','main_address','secondary_address','country','department','city','email','social_security','affiliate_type','affiliate_type_ssg','education','ethnic_group','population_group','occupation','eps','date_affiliation','prepaid','benefits_plan','health_care','notes','contract_number','occupational_hazards','pension_funds','attendant','name_attendant','relationship','phone_attendant'];
			foreach($fields as $row){
				$table->string($row.'_active', 10)->default('no');
				$table->string($row.'_required', 10)->default('no');
			}

			$table->text('epaycokey')->nullable();//
			$table->string('epaycoidc', 10)->nullable();//
			$table->text('epaycopri')->nullable();//

			$table->string('cms')->nullable();
			$table->text('chat')->nullable();//
			$table->text('whatsapp')->nullable();//
			$table->string('state')->default('Pendiente');
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
        Schema::dropIfExists('companies');
    }
}
