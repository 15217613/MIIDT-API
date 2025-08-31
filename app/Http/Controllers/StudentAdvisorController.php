<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveStudentAdvisorRequest;
use App\Models\StudentAdvisor;

use ByCarmona141\KingMonitor\Facades\KingMonitor;

class StudentAdvisorController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de los alert de la base de datos
        // Para retornar todos los datos en el formarto json
        $response = response(StudentAdvisor::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveStudentAdvisorRequest $request) {
        //Creacion del registro en la base de datos
        $studentAdvisor = StudentAdvisor::create($request->validated());
        $response = response($studentAdvisor, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $studentAdvisor->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentAdvisor $studentAdvisor) {
        //Para la estructura de la respuesta
        $response = response($studentAdvisor, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $studentAdvisor->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveStudentAdvisorRequest $request, StudentAdvisor $studentAdvisor) {
        //Actualizacion del registro en la base de datos
        $studentAdvisor->update($request->validated());
        $response = response($studentAdvisor, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $studentAdvisor->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentAdvisor $studentAdvisor) {
        //Eliminar registro en la base de datos
        $studentAdvisor->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $studentAdvisor->id);

        return $response;
    }
}
