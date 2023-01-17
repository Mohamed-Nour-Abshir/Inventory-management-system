<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasereturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchasereturns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->date('expair_date');
            $table->string('supplier_name');
            $table->string('product_name');
            $table->string('quantity');
            $table->string('damage_quantity');
            $table->string('damage_note');
            $table->bigInteger('purchaseproduct_id')->unsigned();
            $table->foreign('purchaseproduct_id')->references('id')->on('purchaseproducts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchasereturns');
    }
}
