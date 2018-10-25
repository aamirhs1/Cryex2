<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('child_units',16,8);
            $table->decimal('child_price_per_unit',16,8);
            $table->decimal('base_units',16,8);
            $table->decimal('remaining',16,8);
            $table->string('status');
            $table->string('type');
            $table->integer('assetpair_id')->unsigned()->nullable();
            
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
