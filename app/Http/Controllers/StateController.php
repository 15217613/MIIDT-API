<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\State;
use App\Http\Requests\SaveStateRequest;

use ByCarmona141\KingMonitor\Facades\KingMonitor;

class StateController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(State::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveStateRequest $request) {
        $state = State::create($request->validated());
        $response = response($state, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $state->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state) {
        //Para la estructura de la respuesta
        $response = response($state, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $state->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveStateRequest $request, State $state) {
        //Actualizacion del registro en la base de datos
        $state->update($request->validated());
        $response = response($state, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $state->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state) {
        //Eliminar registro en la base de datos
        $state->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $state->id);

        return $response;
    }

    public function country($country_id) {
        $response = response(State::getByCountry($country_id), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }
}
