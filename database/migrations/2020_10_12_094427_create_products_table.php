<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('product_id');
            $table->string('product_name', 100);
            $table->string('product_slug', 100);
            $table->string('product_image', 200);
            $table->integer('product_quantity')->default(0);
            $table->float('product_basis_price')->nullable()->default(123.45);
            $table->float('product_price')->nullable()->default(123.45);
            $table->text('product_desc')->nullable()->default('product_desc');
            $table->tinyInteger('product_status');
            $table->timestamp('product_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('product_updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('pro_category_id');

            $table->foreign('pro_category_id')->references('pro_category_id')->on('product_categories')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
