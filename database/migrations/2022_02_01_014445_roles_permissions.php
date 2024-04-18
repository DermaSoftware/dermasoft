<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RolesPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('roles_permissions')) {
			Schema::create('roles_permissions', function (Blueprint $table) {
				$table->id();
				$table->unsignedBigInteger('roles_id');
				$table->foreign('roles_id')->references('id')->on('roles');
				$table->unsignedBigInteger('permissions_id');
				$table->foreign('permissions_id')->references('id')->on('permissions');
			});
		}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('roles_permissions')) {
			Schema::table('roles_permissions', function (Blueprint $table) {
				$table->dropForeign(['roles_id','permissions_id']);
			});
		}
		Schema::dropIfExists('roles_permissions');
    }
}
