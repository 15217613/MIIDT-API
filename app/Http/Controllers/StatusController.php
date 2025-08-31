<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Requests\SaveStatusRequest;

use ByCarmona141\KingMonitor\Facades\KingMonitor;

class StatusController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(Status::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveStatusRequest $request) {
        // Convertir los datos a mayúsculas
        $data = $request->validated();
        $data = array_map(function ($value) {
            return is_string($value) ? mb_strtoupper($value, 'UTF-8') : $value;
        }, $data);

        $status = Status::create($data);
        $response = response($status, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $status->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status) {
        //Para la estructura de la respuesta
        $response = response($status, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $status->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveStatusRequest $request, Status $status) {
        // Convertir los datos a mayúsculas
        $data = $request->validated();
        $data = array_map(function ($value) {
            return is_string($value) ? mb_strtoupper($value, 'UTF-8') : $value;
        }, $data);

        //Actualizacion del registro en la base de datos
        $status->update($data);
        $response = response($status, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $status->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status) {
        //Eliminar registro en la base de datos
        $status->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $status->id);

        return $response;
    }
}
