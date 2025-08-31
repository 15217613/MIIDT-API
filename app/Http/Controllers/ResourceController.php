<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveResourceRequest;
use ByCarmona141\KingMonitor\Facades\KingMonitor;

class ResourceController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(Resource::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveResourceRequest $request) {
        //Creacion del registro en la base de datos
        $resource = Resource::create($request->validated());
        $response = response($resource, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $resource->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Resource $resource) {
        //Para la estructura de la respuesta
        $response = response($resource, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $resource->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveResourceRequest $request, Resource $resource) {
        //Actualizacion del registro en la base de datos
        $resource->update($request->validated());
        $response = response($resource, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $resource->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $resource) {
        //Eliminar registro en la base de datos
        $resource->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $resource->id);

        return $response;
    }
}
