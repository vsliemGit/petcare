<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_services', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('order_service_id');
            $table->string('order_service_adress', 100);
            $table->tinyInteger('order_service_status')->default(0);
            $table->timestamp('order_service_date_begin')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('order_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('order_updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            // $table->unsignedInteger('customer_id');
            
            // $table->foreign('customer_id')->references('customer_id')
            //     ->on('customers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_services');
    }
}
