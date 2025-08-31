<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Requests\SaveCountryRequest;

use ByCarmona141\KingMonitor\Facades\KingMonitor;

class CountryController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(Country::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveCountryRequest $request) {
        //Creacion del registro en la base de datos
        $country = Country::create($request->validated());
        $response = response($country, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $country->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country) {
        //Para la estructura de la respuesta
        $response = response($country, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $country->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveCountryRequest $request, Country $country) {
        //Actualizacion del registro en la base de datos
        $country->update($request->validated());
        $response = response($country, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $country->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country) {
        //Eliminar registro en la base de datos
        $country->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $country->id);

        return $response;
    }
}
