<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('sellorder_units');
            $table->decimal('buyorder_units');
            $table->decimal('price_per_unit');
            $table->integer('buyorder_id')->unsigned()->nullable();
            $table->integer('sellorder_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('buyorder_id')
              ->references('id')->on('orders')
              ->onDelete('cascade');

            $table->foreign('sellorder_id')
              ->references('id')->on('orders')
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
        Schema::dropIfExists('order_transactions');
    }
}
