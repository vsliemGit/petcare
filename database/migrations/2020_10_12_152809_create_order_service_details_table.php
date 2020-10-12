<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderServiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_service_details', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('order_service_id');
            $table->integer('order_detail_quantity')->unsigned()->default(0);

            $table->primary(['order_service_id', 'service_id']);

            $table->foreign('service_id')->references('service_id')
                ->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('order_service_id')->references('order_service_id')
                ->on('order_services')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_service_details');
    }
}
