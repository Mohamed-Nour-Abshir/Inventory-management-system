<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellreturnproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellreturnproducts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->string('quantity');
            $table->string('damage_quantity');
            $table->string('sell_price');
            $table->string('total_amount');
            $table->bigInteger('sellreturn_id')->unsigned();
            $table->foreign('sellreturn_id')->references('id')->on('sellreturns')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sellreturnproducts');
    }
}
