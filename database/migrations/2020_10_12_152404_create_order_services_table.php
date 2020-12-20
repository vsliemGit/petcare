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
            $table->string('order_service_time', 20);
            $table->tinyInteger('order_service_status')->default(0);
            $table->date('order_service_date_begin');
            $table->timestamp('order_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('order_updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('customer_id');
            
            $table->foreign('customer_id')->references('id')
                ->on('customers')->onDelete('cascade')->onUpdate('cascade');
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
