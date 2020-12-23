<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 50)->unique();
            $table->string('password');
            $table->string('name', 100);
            $table->string('email', 100);
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('avatar', 200)->nullable()->default("customer2.png");
            $table->string('phone', 11);
            $table->string('address', 100)->nullable();
            $table->tinyInteger('sex')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
