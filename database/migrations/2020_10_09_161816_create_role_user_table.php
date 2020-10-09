<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('role_id');
            $table->string('name', 50);
            
            $table->primary(['role_id', 'name']);

            $table->foreign('role_id')->references('role_id')->on('roles')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('name')->references('name')->on('users')
            ->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
