<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
           $table->engine = 'InnoDB';
           $table->increments('review_id');
           $table->tinyInteger('review_star')->default(0);
           $table->timestamp('review_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
           $table->timestamp('review_updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
           $table->unsignedInteger('product_id');
        //    $table->unsignedInteger('id');
           
           $table->foreign('product_id')->references('product_id')
                ->on('products')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('id')->references('id')
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
        Schema::dropIfExists('reviews');
    }
}
