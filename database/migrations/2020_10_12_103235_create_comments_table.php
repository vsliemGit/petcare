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
            $table->increments('cmt_id');
            $table->string('cmt_content', 255);
            $table->tinyInteger('cmt_status')->default(0);
            $table->string('name_customer', 50)->nullable();
            $table->string('email_customer', 100)->nullable();
            $table->string('cmt_ip', 24)->nullable();
            $table->timestamp('cmt_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('cmt_updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('customer_id')->nullable();
            
            $table->foreign('product_id')->references('product_id')
                ->on('products')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('comments');
    }
}
