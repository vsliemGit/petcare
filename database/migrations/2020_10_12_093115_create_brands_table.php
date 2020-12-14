<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('brand_id');
            $table->string('brand_name', 100);
            $table->string('brand_slug', 100);
            $table->text('brand_desc')->nullable();
            $table->tinyInteger('brand_status')->nullable()->default(0);
            $table->timestamp('brand_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('brand_updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
