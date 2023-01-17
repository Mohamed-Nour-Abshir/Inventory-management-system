<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockreturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockreturns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->date('expair_date');
            $table->string('quantity');
            $table->string('damage_quantity');
            $table->string('damage_note');
            $table->bigInteger('stockquantitie_id')->unsigned();
            $table->foreign('stockquantitie_id')->references('id')->on('stockquantities')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stockreturns');
    }
}
