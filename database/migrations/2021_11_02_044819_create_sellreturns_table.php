<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellreturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellreturns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('orderID');
            $table->string('customer_name');
            $table->string('current_balance');
            $table->string('due_amount');
            $table->string('received_amount');
            $table->string('return_amount');
            $table->string('damage_note');
            $table->bigInteger('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sellreturns');
    }
}
