<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('buyer_fee',16,8);
            $table->decimal('seller_fee',16,8);
            $table->integer('order_transaction_id')->unsigned()->nullable();
            $table->integer('asset_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('order_transaction_id')
              ->references('id')->on('order_transactions')
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
        Schema::dropIfExists('commission_transactions');
    }
}
