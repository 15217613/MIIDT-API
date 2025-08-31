<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('teacher_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->comment('Estatus del profesor');
            $table->timestamps();

            $table->comment('Tabla de estatus de los profesores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('teacher_statuses');
    }
};
