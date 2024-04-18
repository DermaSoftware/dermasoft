<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();//
			$table->unsignedBigInteger('user')->default(0);//Creada por
			$table->foreign('user')->references('id')->on('users');
			$table->unsignedBigInteger('company')->default(0);//
			$table->string('name')->nullable();//
			$table->text('description')->nullable();//
			$table->string('directed_to')->default('Todos');//Todos, Roles, Users
			$table->text('views')->nullable();//Si roles: 2,3,4...etc, y si Users: 2,3,4...
			$table->string('type_url')->default('PDF');//PDF o URL
			$table->text('url')->nullable();//
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
        Schema::dropIfExists('trainings');
    }
}
