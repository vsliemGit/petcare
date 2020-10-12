<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_service', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('img_id');
            $table->foreign('service_id')->references('service_id')
                ->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('img_id')->references('img_id')
                ->on('images')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_service');
    }
}
