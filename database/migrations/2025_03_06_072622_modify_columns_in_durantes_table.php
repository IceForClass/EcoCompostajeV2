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
        Schema::table('durantes', function (Blueprint $table) {
            $table->float('cantidad_aporteVLitros')->nullable()->change();
            $table->float('cantidad_aporteVKilos')->nullable()->change();
            $table->float('cantidad_aporteSLitros')->nullable()->change();
            $table->float('cantidad_aporteSKilos')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('durantes', function (Blueprint $table) {
            $table->integer('cantidad_aporteVLitros')->change();
            $table->integer('cantidad_aporteVKilos')->change();
            $table->integer('cantidad_aporteSLitros')->change();
            $table->integer('cantidad_aporteSKilos')->change();
        });
    }
};