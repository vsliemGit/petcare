<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->increments('product_detail_id');
            // $table->string('product_detail_name', 100);
            $table->text('product_detail_content')->nullable();
            $table->timestamp('product_detail_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('product_detail_updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('product_id')
                ->on('products')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
}
