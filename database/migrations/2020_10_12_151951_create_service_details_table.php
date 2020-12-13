<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_details', function (Blueprint $table) {          
            $table->increments('service_detail_id');
            $table->string('service_detail_image', 100)->nullable();
            $table->text('service_detail_content')->nullable();
            $table->tinyInteger('service_detail_status')->default(0);
            $table->timestamp('service_detail_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('service_detail_updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('service_id');
            $table->foreign('service_id')->references('service_id')
                ->on('services')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_details');
    }
}
