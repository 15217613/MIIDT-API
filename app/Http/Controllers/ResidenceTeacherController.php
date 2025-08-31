<?php

namespace App\Http\Controllers;

use App\Models\ResidenceTeacher;
use ByCarmona141\KingMonitor\Facades\KingMonitor;
use App\Http\Requests\SaveResidenceTeacherRequest;

class ResidenceTeacherController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(ResidenceTeacher::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveResidenceTeacherRequest $request) {
        $residenceTeacher = ResidenceTeacher::create($request->validated());
        $response = response($residenceTeacher, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $residenceTeacher->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(ResidenceTeacher $residenceTeacher) {
        //Para la estructura de la respuesta
        $response = response($residenceTeacher, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $residenceTeacher->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveResidenceTeacherRequest $request, ResidenceTeacher $residenceTeacher) {
        //Actualizacion del registro en la base de datos
        $residenceTeacher->update($request->validated());
        $response = response($residenceTeacher, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $residenceTeacher->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResidenceTeacher $residenceTeacher) {
        //Eliminar registro en la base de datos
        $residenceTeacher->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $residenceTeacher->id);

        return $response;
    }
}
