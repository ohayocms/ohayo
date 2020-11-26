<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('server_id')->unsigned();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('type')->default(0);
            $table->timestamps();

            $table->foreign('server_id')->references('id')->on('servers');
        });

        Schema::create('store_item_prices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('store_item_id')->unsigned();
            $table->bigInteger('currency_id')->unsigned();
            $table->float('value');
            $table->timestamps();

            $table->foreign('store_item_id')->references('id')->on('store_items');
            $table->foreign('currency_id')->references('id')->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_items');
        Schema::dropIfExists('store_item_prices');
    }
}
