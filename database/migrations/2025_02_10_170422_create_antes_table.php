<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('antes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('registro_id')->unsigned()->index();
            $table->foreign('registro_id')->references('id')->on('registros');
            $table->float('temp_ambiente', 3, 1)->nullable();
            $table->float('temp_compostera', 3, 1)->nullable();
            $table->enum('nivel_llenado', [
                '0%',
                '12.5%',
                '25%',
                '37.5%',
                '50%',
                '62.5%',
                '75%',
                '87.5%',
                '100%'
            ])->nullable();
            $table->enum('olor', ['sin olor','cuadra','agradable','desagradable'])->nullable();
            $table->boolean('animales')->nullable();
            $table->set('tipo_animal',["mosca","mosquita","raton","cucaracha","larvas","otro"])->nullable();
            $table->enum('humedad', ['Defecto','Buena','Exceso'])->nullable();
            $table->string('foto')->nullable();
            $table->text('observaciones')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antes');
    }
};