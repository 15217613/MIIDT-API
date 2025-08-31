<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('generations', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 240)->comment('Generacion del estudiante');
            $table->foreignId('postgraduate_id')->references('id')->on('postgraduates')->comment('Posgrado al que pertenece la generacion');
            $table->foreignId('study_plan_id')->references('id')->on('study_plans')->comment('Plan de estudios de la generacion');
            $table->timestamps();

            $table->unique(['name', 'postgraduate_id']);

            $table->comment('Tabla de generaciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('generations');
    }
};
