<?php

namespace App\Http\Controllers;

use App\Models\OriginInstitution;
use ByCarmona141\KingMonitor\Facades\KingMonitor;
use App\Http\Requests\SaveOriginInstitutionRequest;

class OriginInstitutionController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(OriginInstitution::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveOriginInstitutionRequest $request) {
        //Creacion del registro en la base de datos
        $originInstitution = OriginInstitution::create($request->validated());
        $response = response($originInstitution, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $originInstitution->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(OriginInstitution $originInstitution) {
        //Para la estructura de la respuesta
        $response = response($originInstitution, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $originInstitution->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveOriginInstitutionRequest $request, OriginInstitution $originInstitution) {
        //Actualizacion del registro en la base de datos
        $originInstitution->update($request->validated());
        $response = response($originInstitution, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $originInstitution->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OriginInstitution $originInstitution) {
        //Eliminar registro en la base de datos
        $originInstitution->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $originInstitution->id);

        return $response;
    }
}
