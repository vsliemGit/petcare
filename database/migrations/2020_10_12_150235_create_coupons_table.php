<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('coupon_id');
            $table->string('coupon_name', 100);
            $table->string('coupon_code', 50);
            $table->float('coupon_number')->default(0);
            $table->tinyInteger('coupon_times')->default(0);
            $table->tinyInteger('coupon_condition')->default(0);
            $table->tinyInteger('coupon_status')->nullable()->default(0);
            $table->timestamp('coupon_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('coupon_updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
