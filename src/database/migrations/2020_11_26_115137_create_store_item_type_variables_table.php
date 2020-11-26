<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreItemTypeVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_item_type_variables', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('store_item_type_id')->unsigned();
            $table->string('name');
            $table->string('value');
            $table->timestamps();

            $table->foreign('store_item_type_id')->references('id')->on('store_item_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_item_type_variables');
    }
}
