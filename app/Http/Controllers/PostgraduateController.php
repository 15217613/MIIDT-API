<?php

namespace App\Http\Controllers;

use App\Models\Postgraduate;
use App\Http\Requests\SavePostgraduateRequest;

use ByCarmona141\KingMonitor\Facades\KingMonitor;

class PostgraduateController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(Postgraduate::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SavePostgraduateRequest $request) {
        $postgraduate = Postgraduate::create($request->validated());
        $response = response($postgraduate, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $postgraduate->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Postgraduate $postgraduate) {
        //Para la estructura de la respuesta
        $response = response($postgraduate, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $postgraduate->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SavePostgraduateRequest $request, Postgraduate $postgraduate) {
        //Actualizacion del registro en la base de datos
        $postgraduate->update($request->validated());
        $response = response($postgraduate, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $postgraduate->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Postgraduate $postgraduate) {
        //Eliminar registro en la base de datos
        $postgraduate->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $postgraduate->id);

        return $response;
    }
}
