<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('professional_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 255)->comment('Experiencia profesional');
            $table->foreignId('teacher_id')->references('id')->on('teachers')->comment('Profesor al que pertenece la experiencia profesional');
            $table->timestamps();

            $table->comment('Tabla de experiencia profesional del maestro');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('professional_experiences');
    }
};
