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
            $table->boolean('riego')->default(false)->nullable(); // riego
            $table->boolean('remover')->default(false)->nullable(); // remover
            $table->boolean('aporte_verde')->default(false)->nullable(); // aporte verde
            $table->integer('cantidad_aporteV')->nullable(); // cantidad verde
            $table->string('tipo_aporteV')->nullable(); // tipo verde
            $table->boolean('aporte_seco')->default(false)->nullable(); // aporte seco
            $table->integer('cantidad_aporteS')->nullable(); // cantidad seco
            $table->string('tipo_aporteS')->nullable(); // tipo seco
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
