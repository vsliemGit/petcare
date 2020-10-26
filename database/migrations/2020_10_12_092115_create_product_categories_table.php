<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('pro_category_id');
            $table->string('pro_category_name', 100);
            $table->string('pro_category_slug', 100);
            $table->text('pro_category_desc')->nullable()->default('pro_category_desc');
            $table->tinyInteger('pro_category_status')->nullable()->default(0);
            $table->timestamp('pro_category_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('pro_category_updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_categories');
    }
}
