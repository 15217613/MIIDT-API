<?php

namespace App\Http\Controllers;

use App\Models\PaperTeacher;
use App\Http\Requests\SavePaperTeacherRequest;
use ByCarmona141\KingMonitor\Facades\KingMonitor;

class PaperTeacherController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(PaperTeacher::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SavePaperTeacherRequest $request) {
        //Creacion del registro en la base de datos
        $paperTeacher = PaperTeacher::create($request->validated());
        $response = response($paperTeacher, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $paperTeacher->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(PaperTeacher $paperTeacher) {
        //Para la estructura de la respuesta
        $response = response($paperTeacher, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $paperTeacher->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SavePaperTeacherRequest $request, PaperTeacher $paperTeacher) {
        //Actualizacion del registro en la base de datos
        $paperTeacher->update($request->validated());
        $response = response($paperTeacher, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $paperTeacher->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaperTeacher $paperTeacher) {
        //Eliminar registro en la base de datos
        $paperTeacher->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $paperTeacher->id);

        return $response;
    }
}
