<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('study_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 50)->comment('Nombre del plan de estudios');
            $table->foreignId('postgraduate_id')->references('id')->on('postgraduates')->comment('Posgrado al que pertenece el plan de estudio (MIIDT o DIIDT)');
            $table->timestamps();

            $table->unique(['name', 'postgraduate_id']);

            $table->comment('Tabla de planes de estudios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('study_plans');
    }
};
