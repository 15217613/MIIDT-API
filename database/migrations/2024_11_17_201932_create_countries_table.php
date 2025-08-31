<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 50)->unique()->comment('Nombre del pais');
            $table->string('iso_name', length: 50)->nullable()->unique()->comment('Nombre standard ISO del pais');
            $table->string('alfa2', length: 2)->nullable()->unique()->comment('Código de 2 caracteres del pais');
            $table->string('alfa3', length: 3)->nullable()->unique()->comment('Código de 3 caracteres del pais');
            $table->integer('numeric')->unsigned()->nullable()->unique()->comment('Código numerico del pais');
            $table->timestamps();

            $table->comment('Tabla de paises');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('countries');
    }
};
