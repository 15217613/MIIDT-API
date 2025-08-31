<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveClassroomRequest;
use ByCarmona141\KingMonitor\Facades\KingMonitor;

class ClassroomController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(Classroom::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveClassroomRequest $request) {
        // Convertir los datos a mayúsculas
        $data = $request->validated();
        $data = array_map('strtoupper', $data); // Convierte todos los valores a mayúsculas

        //Creacion del registro en la base de datos
        $classroom = Classroom::create($data);
        $response = response($classroom, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $classroom->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom) {
        //Para la estructura de la respuesta
        $response = response($classroom, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $classroom->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveClassroomRequest $request, Classroom $classroom) {
        // Convertir los datos a mayúsculas
        $data = $request->validated();
        $data = array_map('strtoupper', $data); // Convierte todos los valores a mayúsculas

        //Actualizacion del registro en la base de datos
        $classroom->update($data);
        $response = response($classroom, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $classroom->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom) {
        //Eliminar registro en la base de datos
        $classroom->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $classroom->id);

        return $response;
    }
}
