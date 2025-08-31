<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('postgraduate_teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->references('id')->on('teachers')->comment('Docente');
            $table->foreignId('postgraduate_id')->references('id')->on('postgraduates')->comment('Posgrado');
            $table->foreignId('teacher_status_id')->references('id')->on('teacher_statuses')->comment('Estatus del docente');
            $table->timestamps();

            $table->unique(['teacher_id', 'postgraduate_id']);

            $table->comment('Tabla de posgrados a los que pertenece el docente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('postgraduate_teachers');
    }
};
