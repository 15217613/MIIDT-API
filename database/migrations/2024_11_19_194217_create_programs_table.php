<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 240)->comment('Nombre de la carrera');
            $table->foreignId('program_type_id')->references('id')->on('program_types')->comment('Tipo de programa educativo');
            $table->timestamps();

            $table->unique(['name', 'program_type_id']);

            $table->comment('Tabla de programas educativos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('programs');
    }
};
