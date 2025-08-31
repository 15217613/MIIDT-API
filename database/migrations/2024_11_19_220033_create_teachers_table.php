<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('employee_number')->nullable()->unique()->comment('Numero de empleado');
            $table->string('name', length: 255)->comment('Nombre del profesor');
            $table->string('phone', length:10)->nullable()->unique()->comment('Telefono del profesor');
            $table->string('email')->nullable()->unique()->comment('Correo del profesor');
            $table->timestamps();

            $table->comment('Tabla de maestros');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('teachers');
    }
};
