<?php

namespace App\Http\Controllers;

use App\Models\Distinction;
use App\Http\Requests\SaveDistinctionRequest;

use ByCarmona141\KingMonitor\Facades\KingMonitor;

class DistinctionController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(Distinction::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveDistinctionRequest $request) {
        $distinction = Distinction::create($request->validated());
        $response = response($distinction, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $distinction->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Distinction $distinction) {
        //Para la estructura de la respuesta
        $response = response($distinction, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $distinction->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveDistinctionRequest $request, Distinction $distinction) {
        //Actualizacion del registro en la base de datos
        $distinction->update($request->validated());
        $response = response($distinction, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $distinction->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Distinction $distinction) {
        //Eliminar registro en la base de datos
        $distinction->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $distinction->id);

        return $response;
    }
}
