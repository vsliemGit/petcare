<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('pms_id');
            $table->unsignedInteger('gpms_id');
            $table->string('pms_name', 100);
            $table->tinyInteger('pms_status');
            $table->timestamp('pms_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('pms_update_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('gpms_id')->references('gpms_id')->on('group_permissions')
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
        Schema::dropIfExists('permissions');
    }
}
