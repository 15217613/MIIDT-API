<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveStudentDataRequest;
use App\Models\StudentData;

use ByCarmona141\KingMonitor\Facades\KingMonitor;

class StudentDataController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de los alert de la base de datos
        // Para retornar todos los datos en el formarto json
        $response = response(StudentData::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveStudentDataRequest $request) {
        //Creacion del registro en la base de datos
        $studentData = StudentData::create($request->validated());
        $response = response($studentData, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $studentData->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentData $studentData) {
        //Para la estructura de la respuesta
        $response = response($studentData, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $studentData->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveStudentDataRequest $request, StudentData $studentData) {
        //Actualizacion del registro en la base de datos
        $studentData->update($request->validated());
        $response = response($studentData, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $studentData->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentData $studentData) {
        //Eliminar registro en la base de datos
        $studentData->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $studentData->id);

        return $response;
    }
}
