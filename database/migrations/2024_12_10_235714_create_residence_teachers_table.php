<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('residence_teachers', function (Blueprint $table) {
            $table->id();
            $table->string('institution', length: 255)->comment('Institucion donde se realizo la residencia');
            $table->foreignId('country_id')->references('id')->on('countries')->comment('Pais al que pertenece la institución donde se realizo la residencia');
            $table->foreignId('teacher_id')->references('id')->on('teachers')->comment('Profesor al que pertenece la residencia');
            $table->timestamps();

            $table->comment('Tabla de residencias del maestro');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('residence_teachers');
    }
};
