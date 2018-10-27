<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetPairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_pairs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pair')->default('pairname');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('child_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('parent_id')
              ->references('id')->on('assets')
              ->onDelete('cascade');

            $table->foreign('child_id')
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
        Schema::dropIfExists('asset_pairs');
    }
}
