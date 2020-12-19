<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->increments('visitor_id');
            $table->string('visitor_ip', 24);
            $table->unsignedInteger('customer_id')->nullable();
            $table->timestamp('visitor_created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('visitor_updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('customer_id')->references('id')->on('customers')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitors');
    }
}
