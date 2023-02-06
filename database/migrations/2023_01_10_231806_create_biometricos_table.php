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
        Schema::create('biometricos', function (Blueprint $table) {
            $table->engine='InnoDB'; 
            $table->id();
            $table->bigInteger('id_distributivo')->unsigned();
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->enum('estado',['Atrasado','No dio clases','Esta todo bien']);
            $table->date('fecha_registro');
            $table->timestamps();

            $table->foreign('id_distributivo')->references('id')->on('distributivos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biometricos');
    }
};
