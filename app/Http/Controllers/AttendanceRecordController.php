<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Student;
use App\Models\AttendanceRecord;
use ByCarmona141\KingMonitor\Facades\KingMonitor;
use App\Http\Requests\SaveAttendanceRecordRequest;

class AttendanceRecordController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Obtenemos todos los datos de la base de datos
        $response = response(AttendanceRecord::all(), 200); // Siempre retornar un estado

        KingMonitor::monitor($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveAttendanceRecordRequest $request) {
        //Creacion del registro en la base de datos
        $attendanceRecord = AttendanceRecord::create($request->validated());
        $response = response($attendanceRecord, 201);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $attendanceRecord->id);

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(AttendanceRecord $attendanceRecord) {
        //Para la estructura de la respuesta
        $response = response($attendanceRecord, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $attendanceRecord->id);

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveAttendanceRecordRequest $request, AttendanceRecord $attendanceRecord) {
        //Actualizacion del registro en la base de datos
        $attendanceRecord->update($request->validated());
        $response = response($attendanceRecord, 200);

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $attendanceRecord->id);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttendanceRecord $attendanceRecord) {
        //Eliminar registro en la base de datos
        $attendanceRecord->delete();
        $response = response()->noContent();

        //Guardamos la accion en el monitor
        KingMonitor::monitor($response, $attendanceRecord->id);

        return $response;
    }

    public function registerAttendance(Request $request) {
        $rfid = $request->input('uid');
        $response = NULL;
        $today = Carbon::today();

        if (empty($rfid)) {
            return response()->json([
                'error' => 'RFID no proporcionado.'
            ], 400);
        }

        $student = Student::where('rfid', $rfid)->first();

        if (!$student) {
            return response()->json([
                'error' => 'RFID no registrado en el sistema.'
            ], 404);
        }

        // Buscar si ya tiene asistencia hoy
        $attendance = AttendanceRecord::where('student_id', $student->id)
            ->whereDate('attendance', $today)
            ->first();

        if (!$attendance) {
            // Registrar entrada
            AttendanceRecord::create([
                'student_id' => $student->id,
                'attendance' => $today,
                'entry_time' => now(),
                'exit_time' => now(), // opcional
            ]);

            $response = response()->json(['message' => 'Entrada registrada.'], 201);
        } else {
            // Registrar salida
            $attendance->exit_time = now();
            $attendance->save();

            $response = response()->json(['message' => 'Salida registrada.'], 200);
        }

        return $response;
    }
}
