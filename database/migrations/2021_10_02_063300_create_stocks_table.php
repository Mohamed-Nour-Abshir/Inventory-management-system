<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->bigInteger('purchaseproduct_id')->unsigned();
            $table->foreign('purchaseproduct_id')->references('id')->on('purchaseproducts')->cascadeOnDelete();
            $table->bigInteger('storage_id')->unsigned();
            $table->foreign('storage_id')->references('id')->on('storages');
            $table->string('available_quantity');
            $table->string('quantity');
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
        Schema::dropIfExists('stocks');
    }
}
