<?php

namespace App\Http\Controllers;

use App\Models\Residence;
use App\Http\Requests\SaveResidenceRequest;

use ByCarmona141\KingMonitor\Facades\KingMonitor;

class ResidenceController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(Residence::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveResidenceRequest $request) {
        $residence = Residence::create($request->validated());
        $response = response($residence, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $residence->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Residence $residence) {
        //Para la estructura de la respuesta
        $response = response($residence, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $residence->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveResidenceRequest $request, Residence $residence) {
        //Actualizacion del registro en la base de datos
        $residence->update($request->validated());
        $response = response($residence, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $residence->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Residence $residence) {
        //Eliminar registro en la base de datos
        $residence->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $residence->id);

        return $response;
    }
}
