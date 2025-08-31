<?php

namespace App\Http\Controllers;

use App\Models\Lies;
use App\Http\Requests\SaveLiesRequest;

use ByCarmona141\KingMonitor\Facades\KingMonitor;

class LiesController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(Lies::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveLiesRequest $request) {
        $lies = Lies::create($request->validated());
        $response = response($lies, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $lies->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Lies $lies) {
        //Para la estructura de la respuesta
        $response = response($lies, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $lies->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveLiesRequest $request, Lies $lies) {
        //Actualizacion del registro en la base de datos
        $lies->update($request->validated());
        $response = response($lies, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $lies->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lies $lies) {
        //Eliminar registro en la base de datos
        $lies->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $lies->id);

        return $response;
    }
}
