<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveNativeLanguageRequest;
use App\Models\NativeLanguage;

use ByCarmona141\KingMonitor\Facades\KingMonitor;

class NativeLanguageController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de los alert de la base de datos
        // Para retornar todos los datos en el formarto json
        $response = response(NativeLanguage::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveNativeLanguageRequest $request) {
        //Creacion del registro en la base de datos
        $nativeLanguage = NativeLanguage::create($request->validated());
        $response = response($nativeLanguage, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $nativeLanguage->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(NativeLanguage $nativeLanguage) {
        //Para la estructura de la respuesta
        $response = response($nativeLanguage, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $nativeLanguage->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveNativeLanguageRequest $request, NativeLanguage $nativeLanguage) {
        //Actualizacion del registro en la base de datos
        $nativeLanguage->update($request->validated());
        $response = response($nativeLanguage, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $nativeLanguage->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NativeLanguage $nativeLanguage) {
        //Eliminar registro en la base de datos
        $nativeLanguage->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $nativeLanguage->id);

        return $response;
    }
}
