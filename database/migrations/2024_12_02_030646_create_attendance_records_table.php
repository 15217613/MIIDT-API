<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('attendance_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->comment('Estudiante al que pertenece la asistencia');
            $table->date('attendance')->comment('Fecha de la asistencia');
            $table->timestamp('entry_time')->useCurrent()->comment('Hora de entrada');
            $table->timestamp('exit_time')->useCurrent()->comment('Hora de salida');
            $table->timestamps();

            $table->comment('Tabla de asistencias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('attendance_records');
    }
};
