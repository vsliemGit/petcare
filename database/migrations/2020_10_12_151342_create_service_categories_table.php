<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('service_category_id');
            $table->string('service_category_name', 100);
            $table->string('service_category_slug', 100);
            $table->string('service_category_oject', 100);
            $table->text('service_category_desc')->nullable();
            $table->timestamp('service_category_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('service_category_updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_categories');
    }
}
