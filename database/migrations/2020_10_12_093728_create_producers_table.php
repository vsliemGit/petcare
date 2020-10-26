<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('producer_id');
            $table->string('producer_name', 100);
            $table->text('producer_desc')->nullable()->default('producer_desc');
            $table->tinyInteger('producer_status')->default(0);
            $table->timestamp('producer_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('producers');
    }
}
