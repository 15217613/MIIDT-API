<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePaperRequest;
use App\Models\Paper;
use ByCarmona141\KingMonitor\Facades\KingMonitor;
use Illuminate\Http\Request;

class PaperController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(Paper::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SavePaperRequest $request) {
        //Creacion del registro en la base de datos
        $paper = Paper::create($request->validated());
        $response = response($paper, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $paper->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Paper $paper) {
        //Para la estructura de la respuesta
        $response = response($paper, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $paper->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SavePaperRequest $request, Paper $paper) {
        //Actualizacion del registro en la base de datos
        $paper->update($request->validated());
        $response = response($paper, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $paper->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paper $paper) {
        //Eliminar registro en la base de datos
        $paper->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $paper->id);

        return $response;
    }
}
