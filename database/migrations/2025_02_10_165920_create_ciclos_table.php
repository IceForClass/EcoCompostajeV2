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
        Schema::create('ciclos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger("bolo_id")->unsigned()->index();
            $table->foreign("bolo_id")->references("id")->on("bolos")->onDelete("cascade");
            $table->date("final")->nullable();
            $table->boolean("terminado")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciclos');
    }
};
