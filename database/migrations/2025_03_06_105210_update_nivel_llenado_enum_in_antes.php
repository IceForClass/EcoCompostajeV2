<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('antes', function (Blueprint $table) {
            $table->enum('nivel_llenado', [
                '0%',
                '5%',
                '10%',
                '15%',
                '20%',
                '25%',
                '30%',
                '35%',
                '40%',
                '45%',
                '50%',
                '55%',
                '60%',
                '62.5%',
                '65%',
                '70%',
                '75%',
                '80%',
                '85%',
                '90%',
                '95%',
                '100%'
            ])->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('antes', function (Blueprint $table) {
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
            ])->nullable()->change();
        });
    }
};