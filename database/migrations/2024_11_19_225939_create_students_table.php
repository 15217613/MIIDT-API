<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('generation_id')->references('id')->on('generations')->comment('Generacion a la que pertenece');
            $table->string('curp', length: 18)->comment('CURP del estudiante');
            $table->string('name')->comment('Nombre del estudiante');
            $table->tinyInteger('gender')->comment('Sexo del estudiante (1=Hombre, 2=Mujer)');
            $table->string('email')->comment('Correo del estudiante');
            $table->string('phone', length:10)->nullable()->comment('Telefono del estudiante');
            $table->date('birthdate')->comment('Fecha de nacimiento del estudiante');
            $table->foreignId('program_id')->references('id')->on('programs')->comment('Programa al que pertenece');
            $table->foreignId('origin_institution_id')->references('id')->on('origin_institutions')->comment('Institucion a la que pertenece');
            $table->foreignId('lies_id')->references('id')->on('lies')->comment('Linea de investigacion del estudiante');
            $table->string('folio', length: 10)->nullable()->comment('Folio del estudiante');
            $table->string('clur', length: 10)->nullable()->comment('CLUR del estudiante');
            $table->date('graduation_date')->nullable()->comment('Fecha de graduacion del estudiante');
            $table->foreignId('status_id')->references('id')->on('statuses')->comment('Estatus del estudiante');
            $table->string('rfid')->unique()->nullable();
            $table->timestamps();

            $table->unique(['curp', 'generation_id']);
            $table->unique(['email', 'generation_id']);
            $table->unique(['phone', 'generation_id']);

            $table->comment('Tabla de estudiantes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('students');
    }
};
