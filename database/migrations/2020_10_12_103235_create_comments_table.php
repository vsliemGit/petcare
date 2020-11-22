<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cmt_id');
            $table->text('cmt_content');
            $table->tinyInteger('cmt_status')->default(0);
            $table->timestamp('cmt_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('cmt_updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('product_id');
            // $table->unsignedInteger('customer_id');
            
            $table->foreign('product_id')->references('product_id')
                ->on('products')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('comments');
    }
}
