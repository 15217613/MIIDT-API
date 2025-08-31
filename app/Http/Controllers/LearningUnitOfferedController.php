<?php

namespace App\Http\Controllers;

use App\Models\LearningUnitOffered;
use App\Http\Controllers\Controller;
use ByCarmona141\KingMonitor\Facades\KingMonitor;
use App\Http\Requests\SaveLearningUnitOfferedRequest;

class LearningUnitOfferedController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(LearningUnitOffered::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveLearningUnitOfferedRequest $request) {
        //Creacion del registro en la base de datos
        $learningUnitOffered = LearningUnitOffered::create($request->validated());
        $response = response($learningUnitOffered, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $learningUnitOffered->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(LearningUnitOffered $learningUnitOffered) {
        //Para la estructura de la respuesta
        $response = response($learningUnitOffered, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $learningUnitOffered->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveLearningUnitOfferedRequest $request, LearningUnitOffered $learningUnitOffered) {
        //Actualizacion del registro en la base de datos
        $learningUnitOffered->update($request->validated());
        $response = response($learningUnitOffered, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $learningUnitOffered->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LearningUnitOffered $learningUnitOffered) {
        //Eliminar registro en la base de datos
        $learningUnitOffered->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $learningUnitOffered->id);

        return $response;
    }
}
