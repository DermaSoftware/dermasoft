<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->unique();//
			$table->unsignedBigInteger('company')->default(0);//
			$table->foreign('company')->references('id')->on('companies');
			$table->unsignedBigInteger('category')->default(0);//
			$table->foreign('category')->references('id')->on('categories');
			$table->unsignedBigInteger('subcategory')->default(0);//
			$table->foreign('subcategory')->references('id')->on('subcategories');
			$table->string('code')->nullable();//Código del producto
			$table->string('name')->nullable();//Nombre del producto
			$table->text('description')->nullable();//Descripción
			$table->float('price', 18, 2)->default(0);//Precio
			$table->integer('amount')->default(0);//Unidades disponibles
			$table->integer('stock')->default(0);//Stock mínimo
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
        Schema::dropIfExists('products');
    }
}
