<?php

namespace App\Http\Controllers;

use App\Models\TeacherStatus;
use App\Http\Requests\SaveTeacherStatusesRequest;

use ByCarmona141\KingMonitor\Facades\KingMonitor;

class TeacherStatusController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(TeacherStatus::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveTeacherStatusesRequest $request) {
        $teacherStatus = TeacherStatus::create($request->validated());
        $response = response($teacherStatus, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $teacherStatus->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(TeacherStatus $teacherStatus) {
        //Para la estructura de la respuesta
        $response = response($teacherStatus, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $teacherStatus->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveTeacherStatusesRequest $request, TeacherStatus $teacherStatus) {
        //Actualizacion del registro en la base de datos
        $teacherStatus->update($request->validated());
        $response = response($teacherStatus, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $teacherStatus->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherStatus $teacherStatus) {
        //Eliminar registro en la base de datos
        $teacherStatus->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $teacherStatus->id);

        return $response;
    }
}
