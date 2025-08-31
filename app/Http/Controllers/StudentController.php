<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\SaveStudentRequest;

use ByCarmona141\KingMonitor\Facades\KingMonitor;

class StudentController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de los alert de la base de datos
        // Para retornar todos los datos en el formarto json
        $response = response(Student::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveStudentRequest $request) {
        //Creacion del registro en la base de datos
        $student = Student::create($request->validated());
        $response = response($student, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $student->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student) {
        //Para la estructura de la respuesta
        $response = response($student, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $student->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveStudentRequest $request, Student $student) {
        //Actualizacion del registro en la base de datos
        $student->update($request->validated());
        $response = response($student, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $student->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student) {
        //Eliminar registro en la base de datos
        $student->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $student->id);

        return $response;
    }

    public function generations() {
        $response = response(Student::getByGenerations(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function registerStudent(Request $request) {
        //Creacion del registro en la base de datos
        $student = new Student();
        $response = response($student, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $student->id);

        return $response;
    }
}
