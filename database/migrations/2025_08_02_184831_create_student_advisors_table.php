<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration  {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('student_advisors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->comment('Estudiante asesorado');
            $table->foreignId('director_id')->references('id')->on('teachers')->comment('Director de tesis');
            $table->foreignId('codirector_id')->references('id')->on('teachers')->comment('Codirector de tesis');
            $table->foreignId('tutor_id')->nullable()->references('id')->on('teachers')->comment('Tutor de tesis');
            $table->timestamps();

            $table->unique(['student_id', 'director_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('student_advisors');
    }
};
