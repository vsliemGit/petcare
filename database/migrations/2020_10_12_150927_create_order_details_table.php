<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('order_id');
            $table->integer('order_detail_quantity')->unsigned()->default(0);

            $table->primary(['product_id', 'order_id']);

            $table->foreign('product_id')->references('product_id')
                ->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('order_id')->references('order_id')
                ->on('orders')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
