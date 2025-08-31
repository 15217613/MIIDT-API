<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('conahcyt', function (Blueprint $table) {
            $table->id();
            $table->integer('process')->unique()->unsigned()->comment('Numero del proceso de conahcyt');
            $table->string('name', length: 240)->unique()->comment('Nombre del proceso de conahcyt');
            $table->timestamps();

            $table->comment('Tablas de procesos del conahcyt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('conahcyt');
    }
};
