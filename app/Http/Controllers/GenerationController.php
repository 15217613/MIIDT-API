<?php

namespace App\Http\Controllers;

use App\Models\Generation;
use App\Http\Requests\SaveGenerationRequest;

use ByCarmona141\KingMonitor\Facades\KingMonitor;

class GenerationController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de los alert de la base de datos
        // Para retornar todos los datos en el formarto json
        $response = response(Generation::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveGenerationRequest $request) {
        //Creacion del registro en la base de datos
        $generation = Generation::create($request->validated());
        $response = response($generation, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $generation->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Generation $generation) {
        //Para la estructura de la respuesta
        $response = response($generation, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $generation->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveGenerationRequest $request, Generation $generation) {
        //Actualizacion del registro en la base de datos
        $generation->update($request->validated());
        $response = response($generation, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $generation->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Generation $generation) {
        //Eliminar registro en la base de datos
        $generation->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $generation->id);

        return $response;
    }
}
