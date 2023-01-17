<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasereturnquantitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchasereturnquantities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('warehouse_name');
            $table->string('warehouse_quantity');
            $table->string('damage_quantity');
            $table->bigInteger('purchasereturn_id')->unsigned();
            $table->foreign('purchasereturn_id')->references('id')->on('purchasereturns')->cascadeOnDelete();
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
        Schema::dropIfExists('purchasereturnquantities');
    }
}
