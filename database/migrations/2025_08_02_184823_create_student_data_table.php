<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration  {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('student_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->comment('Estudiante asesorado');
            $table->foreignId('impairment_id')->nullable()->references('id')->on('impairments')->comment('Discapacidad del Estudiante');
            $table->foreignId('native_language_id')->nullable()->references('id')->on('native_languages')->comment('Lengua Indigena del Estudiante');
            $table->string('registration', length: 10)->comment('Matricula del estudiante');
            $table->string('cvu', length: 11)->comment('CVU del estudiante');
            $table->string('orcid', length: 40)->nullable()->comment('ORCID del estudiante');
            $table->text('photo')->nullable()->comment('Foto del estudiante');
            $table->text('topic')->comment('Tema de tesis');
            $table->text('topic_url')->nullable()->comment('Url donde se encuentra el tema de tesis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('student_data');
    }
};
