<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('transfer_id');
            $table->string('transfer_name', 100);
            $table->float('transfer_shipping')->nullable()->default(123.45);
            $table->tinyInteger('transfer_status');
            $table->text('transfer_desc')->nullable()->default('transfer_desc');
            $table->timestamp('transfer_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('transfer_updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfers');
    }
}
