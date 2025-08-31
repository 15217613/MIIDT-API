<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('learning_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lies_id')->references('id')->on('lies')->comment('Linea de investigacion a la que pertenece la unidad de aprendizaje');
            $table->string('key', length: 15)->nullable()->unique()->comment('Clave de la materia');
            $table->string('name', length: 255)->comment('Nombre de la unidad de aprendizaje');
            $table->integer('credits')->unsigned()->comment('Creditos de la materia');
            $table->integer('total_hours')->unsigned()->comment('Total de horas de la materia');
            $table->timestamps();

            $table->comment('Tabla de unidades de aprendizaje');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('learning_units');
    }
};
