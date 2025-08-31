<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use App\Http\Requests\SaveDegreeRequest;

use ByCarmona141\KingMonitor\Facades\KingMonitor;

class DegreeController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(Degree::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveDegreeRequest $request) {
        //Creacion del registro en la base de datos
        $degree = Degree::create($request->validated());
        $response = response($degree, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $degree->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Degree $degree) {
        //Para la estructura de la respuesta
        $response = response($degree, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $degree->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveDegreeRequest $request, Degree $degree) {
        //Actualizacion del registro en la base de datos
        $degree->update($request->validated());
        $response = response($degree, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $degree->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Degree $degree) {
        //Eliminar registro en la base de datos
        $degree->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $degree->id);

        return $response;
    }
}
