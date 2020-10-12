<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
           $table->engine = 'InnoDB';
           $table->increments('service_id');
           $table->string('service_name', 100);
           $table->string('service_slug', 100);
           $table->float('service_price')->nullable()->default(123.45);
           $table->text('service_desc')->nullable()->default('service_desc');
           $table->timestamp('service_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('service_updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
