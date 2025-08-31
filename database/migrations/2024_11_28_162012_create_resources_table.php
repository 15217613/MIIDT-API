<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 100)->unique()->comment('Tipo de resource (Libro, Articulo, Capitulo de Libro)');
            $table->timestamps();

            $table->comment('Tabla de tipo de recurso (Libro, Articulo, Capitulo de Libro)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('resources');
    }
};
