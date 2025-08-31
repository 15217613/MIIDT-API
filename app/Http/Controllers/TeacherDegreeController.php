<?php

namespace App\Http\Controllers;

use App\Models\TeacherDegree;
use App\Http\Requests\SaveTeacherDegreeRequest;

use ByCarmona141\KingMonitor\Facades\KingMonitor;

class TeacherDegreeController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(TeacherDegree::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveTeacherDegreeRequest $request) {
        $teacherDegree = TeacherDegree::create($request->validated());
        $response = response($teacherDegree, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $teacherDegree->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(TeacherDegree $teacherDegree) {
        //Para la estructura de la respuesta
        $response = response($teacherDegree, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $teacherDegree->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveTeacherDegreeRequest $request, TeacherDegree $teacherDegree) {
        //Actualizacion del registro en la base de datos
        $teacherDegree->update($request->validated());
        $response = response($teacherDegree, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $teacherDegree->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherDegree $teacherDegree) {
        //Eliminar registro en la base de datos
        $teacherDegree->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $teacherDegree->id);

        return $response;
    }
}
