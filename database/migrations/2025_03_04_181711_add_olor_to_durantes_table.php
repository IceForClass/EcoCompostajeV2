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
            $table->enum('olor', ['sin olor','cuadra','agradable','desagradable'])->nullable()->after('observaciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('durantes', function (Blueprint $table) {
            $table->dropColumn('olor');
        });
    }
};