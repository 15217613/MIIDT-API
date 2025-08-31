<?php

namespace App\Http\Controllers;

use App\Models\AssignedUnit;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveAssignedUnitRequest;
use ByCarmona141\KingMonitor\Facades\KingMonitor;

class AssignedUnitController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(AssignedUnit::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveAssignedUnitRequest $request) {
        //Creacion del registro en la base de datos
        $assignedUnit = AssignedUnit::create($request->validated());
        $response = response($assignedUnit, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $assignedUnit->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(AssignedUnit $assignedUnit) {
        //Para la estructura de la respuesta
        $response = response($assignedUnit, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $assignedUnit->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveAssignedUnitRequest $request, AssignedUnit $assignedUnit) {
        //Actualizacion del registro en la base de datos
        $assignedUnit->update($request->validated());
        $response = response($assignedUnit, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $assignedUnit->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssignedUnit $assignedUnit) {
        //Eliminar registro en la base de datos
        $assignedUnit->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $assignedUnit->id);

        return $response;
    }
}
