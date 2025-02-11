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
        Schema::create('durantes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('registro_id')->unsigned()->index();
            $table->foreign('registro_id')->references('id')->on('registros')->onDelete('cascade');
            $table->boolean('riego')->default(false)->nullable();
            $table->boolean('remover')->default(false)->nullable();
            $table->boolean('aporte_verde')->default(false)->nullable();
            $table->integer('cantidad_aporteV')->nullable();
            $table->string('tipo_aporteV')->nullable();
            $table->boolean('aporte_seco')->default(false)->nullable();
            $table->integer('cantidad_aporteS')->nullable();
            $table->string('tipo_aporteS')->nullable();
            $table->string('foto')->nullable();
            $table->string('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('durantes');
    }
};