<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 50)->unique()->comment('Estado del estudiante (Aspirante, estudiante, egresado)');
            $table->timestamps();

            $table->comment('Tabla del estatus del estudiante');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('statuses');
    }
};
