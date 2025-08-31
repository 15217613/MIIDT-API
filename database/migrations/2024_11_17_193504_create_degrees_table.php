<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('degrees', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 25)->unique()->comment('Grado del profesor (Tecnico, Licenciatura, Especializacion, Maestría, Doctorado, Doctorado Honoris Causa)');
            $table->timestamps();

            $table->comment('Tabla de grados academicos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('degrees');
    }
};
