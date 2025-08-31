<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('assigned_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('learning_unit_offered_id')->references('id')->on('learning_unit_offereds')->comment('Unidad de Aprendizaje Ofertada');
            $table->foreignId('student_id')->references('id')->on('students')->comment('Estudiante');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('assigned_units');
    }
};
