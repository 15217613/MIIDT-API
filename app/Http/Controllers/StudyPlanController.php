<?php

namespace App\Http\Controllers;

use App\Models\StudyPlan;
use App\Http\Requests\SaveStudyPlanRequest;
use ByCarmona141\KingMonitor\Facades\KingMonitor;

class StudyPlanController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(StudyPlan::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveStudyPlanRequest $request) {
        // Convertir los datos a mayúsculas
        $data = $request->validated();
        $data = array_map(function ($value) {
            return is_string($value) ? mb_strtoupper($value, 'UTF-8') : $value;
        }, $data);

        //Creacion del registro en la base de datos
        $studyPlan = StudyPlan::create($data);
        $response = response($studyPlan, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $studyPlan->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(StudyPlan $studyPlan) {
        //Para la estructura de la respuesta
        $response = response($studyPlan, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $studyPlan->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveStudyPlanRequest $request, StudyPlan $studyPlan) {
        // Convertir los datos a mayúsculas
        $data = $request->validated();
        $data = array_map(function ($value) {
            return is_string($value) ? mb_strtoupper($value, 'UTF-8') : $value;
        }, $data);

        //Actualizacion del registro en la base de datos
        $studyPlan->update($data);
        $response = response($studyPlan, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $studyPlan->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudyPlan $studyPlan) {
        //Eliminar registro en la base de datos
        $studyPlan->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $studyPlan->id);

        return $response;
    }
}
