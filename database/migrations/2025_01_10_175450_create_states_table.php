<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->references('id')->on('countries')->comment('Pais al que pertenece el estado');
            $table->string('name', length: 240)->comment('Nombre del estado');
            $table->timestamps();

            $table->unique(['name', 'country_id']);

            $table->comment('Tabla de estados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('states');
    }
};
