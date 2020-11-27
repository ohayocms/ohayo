<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypeToTypeIdInStoreItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('store_items', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->bigInteger('store_item_type_id')->unsigned();

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
        Schema::table('store_items', function (Blueprint $table) {
            $table->dropForeign('store_item_type_id');
            $table->dropColumn('store_item_type_id');
            $table->tinyInteger('type');
        });
    }
}
