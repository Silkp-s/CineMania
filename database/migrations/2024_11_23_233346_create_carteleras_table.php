<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartelerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carteleras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cine_id');          
            $table->timestamps();
            $table->foreign('cine_id')->references('id')->on('cines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartelers');
    }
}
