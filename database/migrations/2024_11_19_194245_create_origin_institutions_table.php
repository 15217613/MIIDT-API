<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('origin_institutions', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 240)->unique()->comment('Nombre de la Institucion');
            $table->string('acronym', length: 20)->nullable()->unique()->comment('Siglas de la Institucion');
            $table->foreignId('country_id')->references('id')->on('countries')->comment('Pais al que pertenece la institucion');
            $table->timestamps();

            $table->comment('Tabla de instituciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('origin_institutions');
    }
};
