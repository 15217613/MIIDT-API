<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Requests\SaveTeacherRequest;

use ByCarmona141\KingMonitor\Facades\KingMonitor;

class TeacherController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de los alert de la base de datos
        // Para retornar todos los datos en el formarto json
        $response = response(Teacher::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveTeacherRequest $request) {
        //Creacion del registro en la base de datos
        $teacher = Teacher::create($request->validated());
        $response = response($teacher, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $teacher->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher) {
        //Para la estructura de la respuesta
        $response = response($teacher, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $teacher->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveTeacherRequest $request, Teacher $teacher) {
        //Actualizacion del registro en la base de datos
        $teacher->update($request->validated());
        $response = response($teacher, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $teacher->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher) {
        //Eliminar registro en la base de datos
        $teacher->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $teacher->id);

        return $response;
    }
}
