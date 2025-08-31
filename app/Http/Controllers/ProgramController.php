<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Http\Requests\SaveProgramRequest;
use ByCarmona141\KingMonitor\Facades\KingMonitor;

class ProgramController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(Program::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveProgramRequest $request) {
        // Convertir los datos a mayúsculas
        $data = $request->validated();
        $data = array_map(function ($value) {
            return is_string($value) ? mb_strtoupper($value, 'UTF-8') : $value;
        }, $data);

        //Creacion del registro en la base de datos
        $program = Program::create($data);
        $response = response($program, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $program->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program) {
        //Para la estructura de la respuesta
        $response = response($program, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $program->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveProgramRequest $request, Program $program) {
        // Convertir los datos a mayúsculas
        $data = $request->validated();
        $data = array_map(function ($value) {
            return is_string($value) ? mb_strtoupper($value, 'UTF-8') : $value;
        }, $data);

        //Actualizacion del registro en la base de datos
        $program->update($data);
        $response = response($program, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $program->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program) {
        //Eliminar registro en la base de datos
        $program->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $program->id);

        return $response;
    }
}
