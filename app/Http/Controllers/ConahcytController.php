<?php

namespace App\Http\Controllers;

use App\Models\Conahcyt;
use App\Http\Requests\SaveConahcytRequest;

use ByCarmona141\KingMonitor\Facades\KingMonitor;

class ConahcytController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(Conahcyt::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveConahcytRequest $request) {
        //Creacion del registro en la base de datos
        $conahcyt = Conahcyt::create($request->validated());
        $response = response($conahcyt, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $conahcyt->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Conahcyt $conahcyt) {
        //Para la estructura de la respuesta
        $response = response($conahcyt, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $conahcyt->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveConahcytRequest $request, Conahcyt $conahcyt) {
        //Actualizacion del registro en la base de datos
        $conahcyt->update($request->validated());
        $response = response($conahcyt, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $conahcyt->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conahcyt $conahcyt) {
        //Eliminar registro en la base de datos
        $conahcyt->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $conahcyt->id);

        return $response;
    }
}
