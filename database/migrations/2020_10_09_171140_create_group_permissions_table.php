<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_permissions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('gpms_id');
            $table->string('gpms_name', 100);
            $table->tinyInteger('gpms_status');
            $table->timestamp('gpms_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('gpms_update_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_permissions');
    }
}
