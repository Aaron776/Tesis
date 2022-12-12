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
        Schema::create('distributivo', function (Blueprint $table) {
            $table->engine='InnoDB'; 
            $table->id();
            $table->bigInteger('users_id')->unsigned();
            $table->bigInteger('materia_id')->unsigned();
            $table->integer('horas_semana');
            $table->string('tipo',20);
            $table->timestamp('hora_entrada');
            $table->timestamp('horas_salida');
            $table->string('materia');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('materia_id')->references('id')->on('materia')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distributivo');
    }
};
