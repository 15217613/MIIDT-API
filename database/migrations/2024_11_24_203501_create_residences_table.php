<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('residences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->comment('Estudiante al que pertenece la residencia');
            $table->string('institution', length: 255)->comment('Institucion donde se realizo la residencia');
            $table->string('area', length: 255)->comment('Area de la Institucion donde se realizo la residencia');
            $table->date('start_date')->comment('Fecha de inicio de la residencia');
            $table->date('end_date')->comment('Fecha de termino de la residencia');
            $table->foreignId('country_id')->references('id')->on('countries')->comment('Pais al que pertenece la institución donde se realizo la residencia');
            $table->text('stay_request')->nullable()->comment('Solicitud de estancia');
            $table->text('acceptance_letter')->nullable()->comment('Carta de aceptacion de la estancia');
            $table->text('work_schedule')->nullable()->comment('Plan de trabajo de la estancia');
            $table->timestamps();

            $table->comment('Tabla de residencias del estudiante');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('residences');
    }
};
