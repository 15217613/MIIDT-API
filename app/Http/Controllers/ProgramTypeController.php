<?php

namespace App\Http\Controllers;

use App\Models\ProgramType;
use App\Http\Requests\SaveProgramTypeRequest;
use ByCarmona141\KingMonitor\Facades\KingMonitor;

class ProgramTypeController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(ProgramType::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveProgramTypeRequest $request) {
        // Convertir los datos a mayúsculas
        $data = $request->validated();
        $data = array_map('strtoupper', $data); // Convierte todos los valores a mayúsculas

        //Creacion del registro en la base de datos
        $programType = ProgramType::create($data);
        $response = response($programType, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $programType->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgramType $programType) {
        //Para la estructura de la respuesta
        $response = response($programType, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $programType->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveProgramTypeRequest $request, ProgramType $programType) {
        // Convertir los datos a mayúsculas
        $data = $request->validated();
        $data = array_map('strtoupper', $data); // Convierte todos los valores a mayúsculas

        //Actualizacion del registro en la base de datos
        $programType->update($data);
        $response = response($programType, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $programType->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramType $programType) {
        //Eliminar registro en la base de datos
        $programType->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $programType->id);

        return $response;
    }
}
