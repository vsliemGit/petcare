<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('store_id');
            $table->string('store_name', 200);
            $table->string('store_address', 255);
            $table->string('store_image', 200)->nullable();
            $table->tinyInteger('store_status')->default(0);
            $table->decimal('store_latitude', 8, 6)->nullable();
            $table->decimal('store_longitude', 9, 6)->nullable();
            $table->timestamp('store_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('store_updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
