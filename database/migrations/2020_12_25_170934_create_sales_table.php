<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('sale_id');
            $table->string('sale_name', 100);
            $table->float('sale_number')->default(0);
            $table->date('sale_start_date')->default(0)->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('sale_end_date')->nullable();
            $table->tinyInteger('sale_condition')->default(0);
            $table->tinyInteger('sale_status')->nullable()->default(0);
            $table->timestamp('sale_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('sale_updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
