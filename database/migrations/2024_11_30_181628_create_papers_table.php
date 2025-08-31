<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('papers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resource_id')->references('id')->on('resources')->comment('Tipo de recurso');
            $table->foreignId('student_id')->references('id')->on('students')->comment('Estudiante al que pertenece el articulo');
            $table->string('name', length: 255)->comment('Nombre del paper');
            $table->year('publication_year')->comment('Year de publicacion del paper');
            $table->string('doi', length: 100)->nullable()->comment('doi del paper');
            $table->string('isbn', length: 20)->nullable()->comment('isbn del paper');
            $table->string('issn', length: 20)->nullable()->comment('issn del paper');
            $table->string('pages', length: 50)->nullable()->comment('Paginas donde se encuentra el paper');
            $table->text('url')->nullable()->comment('Url donde se encuentra el paper');
            $table->text('reference')->nullable()->comment('Referencia del paper');
            $table->timestamps();

            $table->comment('Tabla de articulos del alumno');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('papers');
    }
};
