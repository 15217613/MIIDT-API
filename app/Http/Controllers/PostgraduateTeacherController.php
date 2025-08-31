<?php

namespace App\Http\Controllers;

use App\Models\PostgraduateTeacher;
use ByCarmona141\KingMonitor\Facades\KingMonitor;
use App\Http\Requests\SavePostgraduateTeacherRequest;

class PostgraduateTeacherController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(PostgraduateTeacher::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SavePostgraduateTeacherRequest $request) {
        $postgraduateTeacher = PostgraduateTeacher::create($request->validated());
        $response = response($postgraduateTeacher, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $postgraduateTeacher->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(PostgraduateTeacher $postgraduateTeacher) {
        //Para la estructura de la respuesta
        $response = response($postgraduateTeacher, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $postgraduateTeacher->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SavePostgraduateTeacherRequest $request, PostgraduateTeacher $postgraduateTeacher) {
        //Actualizacion del registro en la base de datos
        $postgraduateTeacher->update($request->validated());
        $response = response($postgraduateTeacher, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $postgraduateTeacher->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostgraduateTeacher $postgraduateTeacher) {
        //Eliminar registro en la base de datos
        $postgraduateTeacher->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $postgraduateTeacher->id);

        return $response;
    }
}
