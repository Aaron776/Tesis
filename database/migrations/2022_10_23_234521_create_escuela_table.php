<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escuela', function (Blueprint $table) {
            $table->engine='InnoDB'; 
            $table->id();
            $table->bigInteger('periodo_id')->unsigned();
            $table->timestamps();

            $table->foreign('periodo_id')->references('id')->on('periodo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escuela');
    }
};
