<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('order_id');
            $table->string('order_adress', 100);
            $table->string('to_name', 100)->nullable();
            $table->string('to_email', 100)->nullable();
            $table->string('to_phone', 11)->nullable();
            $table->tinyInteger('order_status')->default(0);
            $table->text('order_notes')->nullable();
            $table->timestamp('order_date_shipping')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('order_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('order_updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('transfer_id');
            $table->unsignedInteger('coupon_id')->nullable();
            $table->unsignedInteger('payment_id');
            $table->unsignedInteger('customer_id')->nullable();

            $table->foreign('transfer_id')->references('transfer_id')
                ->on('transfers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('payment_id')->references('payment_id')
                ->on('payments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('customer_id')->references('id')
                ->on('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('coupon_id')->references('coupon_id')
                ->on('coupons')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
