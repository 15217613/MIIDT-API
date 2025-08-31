<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('distinctions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nombre de la distincion del profesor');
            $table->foreignId('teacher_id')->references('id')->on('teachers')->comment('Profesor al que pertenece la distincion');
            $table->timestamps();

            $table->comment('Tabla de distincion del profesor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('distinctions');
    }
};
