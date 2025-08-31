<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('learning_unit_offereds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->references('id')->on('teachers')->comment('Profesor asignado');
            $table->foreignId('learning_unit_id')->references('id')->on('learning_units')->comment('Unidad de aprendizaje asignada');
            $table->foreignId('classroom_id')->references('id')->on('classrooms')->comment('Aula asignada');
            $table->json('schedule_details')->comment('Horario asignado');
            $table->timestamps();

            $table->comment('Tabla de unidades de aprendizaje ofertadas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('learning_unit_offereds');
    }
};
