<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleGroupPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_group_permission', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('gpms_id');

            $table->primary(['role_id', 'gpms_id']);

            $table->foreign('role_id')->references('role_id')->on('roles')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('gpms_id')->references('gpms_id')->on('group_permissions')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_group_permission');
    }
}
