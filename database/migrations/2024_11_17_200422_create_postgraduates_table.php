<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('postgraduates', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 240)->unique()->comment('Nombre del posgrado');
            $table->string('acronym', length: 5)->unique()->comment('Siglas del posgrado (MIIDT o DIIDT)');
            $table->integer('duration')->unsigned()->comment('duracion en semestres');
            $table->float('cost')->nullable()->comment('Costo del posgrado en semestres');
            $table->timestamps();

            $table->comment('Tabla de posgrados (MIIDT o DIIDT)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('postgraduates');
    }
};
