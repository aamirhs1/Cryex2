<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address')->nullable();
            $table->decimal('available_balance',16,8)->default(0.0);
            $table->decimal('on_orders',16,8)->default(0.0);
            $table->decimal('on_hold',16,8)->default(0.0);
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('asset_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('user_id')
              ->references('id')->on('users')
              ->onDelete('cascade');

            $table->foreign('asset_id')
              ->references('id')->on('assets')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_accounts');
    }
}
