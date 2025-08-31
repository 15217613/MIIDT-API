<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveImpairmentRequest;
use App\Models\Impairment;
use App\Http\Requests\SaveGenerationRequest;

use ByCarmona141\KingMonitor\Facades\KingMonitor;

class ImpairmentController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de los alert de la base de datos
        // Para retornar todos los datos en el formarto json
        $response = response(Impairment::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveImpairmentRequest $request) {
        //Creacion del registro en la base de datos
        $impairment = Impairment::create($request->validated());
        $response = response($impairment, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $impairment->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Impairment $impairment) {
        //Para la estructura de la respuesta
        $response = response($impairment, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $impairment->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveImpairmentRequest $request, Impairment $impairment) {
        //Actualizacion del registro en la base de datos
        $impairment->update($request->validated());
        $response = response($impairment, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $impairment->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Impairment $impairment) {
        //Eliminar registro en la base de datos
        $impairment->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $impairment->id);

        return $response;
    }
}
