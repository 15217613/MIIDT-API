<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration  {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('native_languages', function (Blueprint $table) {
            $table->id();
            $table->string('denomination', length: 50)->unique()->comment('Autodenominacion de la lengua indigena');
            $table->string('name', length: 50)->unique()->comment('Nombre de la lengua indigena');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('native_languages');
    }
};
