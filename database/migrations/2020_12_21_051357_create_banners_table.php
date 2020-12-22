<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('banner_id');
            $table->string('banner_name', 200);
            $table->string('banner_image', 200);
            $table->string('banner_url', 250)->nullable();
            $table->tinyInteger('banner_status')->default(0);
            $table->timestamp('banner_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('banner_updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
