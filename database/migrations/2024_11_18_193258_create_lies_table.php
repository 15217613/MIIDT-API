<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('lies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('study_plan_id')->references('id')->on('study_plans')->comment('Plan de estudios a la que pertenece la linea de investigacion');
            $table->string('name', length: 240)->comment('Linea de investigacion del estudiante (TICs, Geomatica, Constructor)');
            $table->string('acronym', length: 5)->comment('Siglas de la linea del estudiante (TICs, Geo, CSR)');
            $table->text('description')->nullable()->comment('Descripcion de la linea');
            $table->timestamps();

            $table->unique(['name', 'acronym', 'study_plan_id']);

            $table->comment('Tabla de lineas de investigacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('lies');
    }
};
