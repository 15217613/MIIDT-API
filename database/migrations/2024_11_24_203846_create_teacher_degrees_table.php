<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('teacher_degrees', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 255)->comment('Nombre del grado del profesor');
            $table->foreignId('teacher_id')->references('id')->on('teachers')->comment('Profesor al que pertenece el grado');
            $table->foreignId('degree_id')->references('id')->on('degrees')->comment('Grado del profesor  (Tecnico, Licenciatura, Especializacion, Maestría, Doctorado, Doctorado Honoris Causa)');
            $table->timestamps();

            $table->comment('Tabla de grados academicos del profesor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('teacher_degrees');
    }
};
