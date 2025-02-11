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
            $table->foreign('registro_id')->references('id')->on('registros')->onDelete('cascade');
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
            $table->enum('olor', ['Sin mal olor','Neutral','Podrido','Otro'])->nullable();
            $table->boolean('insectos')->nullable();
            $table->set('tipos_insectos',["larvas","hormigas","mosquitos","gusanos"])->nullable();
            $table->enum('humedad', ['Deficiente','Bueno','Excesivo'])->nullable();
            $table->string('foto')->nullable(); // initial photos (URL of the image)
            $table->text('observaciones')->nullable(); // initial observations
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
