<?php

namespace App\Http\Controllers;

use App\Models\LearningUnit;
use App\Http\Requests\SaveLearningUnitRequest;
use ByCarmona141\KingMonitor\Facades\KingMonitor;

class LearningUnitController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(LearningUnit::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveLearningUnitRequest $request) {
        //Creacion del registro en la base de datos
        $learningUnit = LearningUnit::create($request->validated());
        $response = response($learningUnit, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $learningUnit->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(LearningUnit $learningUnit) {
        //Para la estructura de la respuesta
        $response = response($learningUnit, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $learningUnit->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveLearningUnitRequest $request, LearningUnit $learningUnit) {
        //Actualizacion del registro en la base de datos
        $learningUnit->update($request->validated());
        $response = response($learningUnit, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $learningUnit->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LearningUnit $learningUnit) {
        //Eliminar registro en la base de datos
        $learningUnit->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $learningUnit->id);

        return $response;
    }
}
