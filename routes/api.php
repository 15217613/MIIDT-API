<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LiesController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ConahcytController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ResidenceController;
use App\Http\Controllers\StudyPlanController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GenerationController;
use App\Http\Controllers\ImpairmentController;
use App\Http\Controllers\StudentDataController;
use App\Http\Controllers\DistinctionController;
use App\Http\Controllers\ProgramTypeController;
use App\Http\Controllers\LearningUnitController;
use App\Http\Controllers\AssignedUnitController;
use App\Http\Controllers\PaperTeacherController;
use App\Http\Controllers\PostgraduateController;
use App\Http\Controllers\TeacherDegreeController;
use App\Http\Controllers\TeacherStatusController;
use App\Http\Controllers\StudentAdvisorController;
use App\Http\Controllers\NativeLanguageController;
use App\Http\Controllers\AttendanceRecordController;
use App\Http\Controllers\ResidenceTeacherController;
use App\Http\Controllers\OriginInstitutionController;
use App\Http\Controllers\LearningUnitOfferedController;
use App\Http\Controllers\ProfessionalExperienceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/prueba', function () {
    return Hash::make('password');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:api'])->apiResource('/assignedUnit', AssignedUnitController::class)->names('api.assignedUnit');
Route::middleware(['auth:api'])->group(function () {
    Route::post('/attendanceRecord/registerAttendance', [AttendanceRecordController::class, 'registerAttendance'])->name('api.attendanceRecord.registerAttendance');

    Route::apiResource('/attendanceRecord', AttendanceRecordController::class)->names('api.attendanceRecord');
});
Route::middleware(['auth:api'])->apiResource('/classroom', ClassroomController::class)->names('api.classroom');
Route::middleware(['auth:api'])->apiResource('/conahcyt', ConahcytController::class)->names('api.conahcyt');
Route::middleware(['auth:api'])->apiResource('/country', CountryController::class)->names('api.country');
Route::middleware(['auth:api'])->apiResource('/degree', DegreeController::class)->names('api.degree');
Route::middleware(['auth:api'])->apiResource('/distinction', DistinctionController::class)->names('api.distinction');
Route::middleware(['auth:api'])->apiResource('/generation', GenerationController::class)->names('api.generation');
Route::middleware(['auth:api'])->apiResource('/impairment', ImpairmentController::class)->names('api.impairment');
Route::middleware(['auth:api'])->apiResource('/learningUnit', LearningUnitController::class)->names('api.learningUnit');
Route::middleware(['auth:api'])->apiResource('/learningUnitOffered', LearningUnitOfferedController::class)->names('api.learningUnitOffered');
Route::middleware(['auth:api'])->apiResource('/lies', LiesController::class)->names('api.lies')->parameters([
    'lies' => 'lies', // Forzar el nombre del parámetro a "lies"
]);
Route::middleware(['auth:api'])->apiResource('/nativeLanguage', NativeLanguageController::class)->names('api.nativeLanguague');
Route::middleware(['auth:api'])->apiResource('/originInstitution', OriginInstitutionController::class)->names('api.paper');
Route::middleware(['auth:api'])->apiResource('/paper', PaperController::class)->names('api.paper');
Route::middleware(['auth:api'])->apiResource('/paperTeacher', PaperTeacherController::class)->names('api.paperTeacher');
Route::middleware(['auth:api'])->apiResource('/program', ProgramController::class)->names('api.program');
Route::middleware(['auth:api'])->apiResource('/programType', ProgramTypeController::class)->names('api.programType');
Route::middleware(['auth:api'])->apiResource('/postgraduate', PostgraduateController::class)->names('api.postgraduate');
Route::middleware(['auth:api'])->apiResource('/professionalExperience', ProfessionalExperienceController::class)->names('api.professionalExperience');
Route::middleware(['auth:api'])->apiResource('/residence', ResidenceController::class)->names('api.residence');
Route::middleware(['auth:api'])->apiResource('/residenceTeacher', ResidenceTeacherController::class)->names('api.residenceTeacher');
Route::middleware(['auth:api'])->apiResource('/resource', ResourceController::class)->names('api.resource');
Route::middleware(['auth:api'])->controller(StateController::class)->group(function () {
    Route::get('/state/country/{country_id}', 'country')->name('api.state.country');
});
Route::middleware(['auth:api'])->apiResource('/state', StateController::class)->names('api.state');
Route::middleware(['auth:api'])->apiResource('/status', StatusController::class)->names('api.status');
Route::middleware(['auth:api'])->controller(StudentController::class)->group(function () {
    Route::get('/student/generations', 'generations')->name('api.student.generations');
});
Route::middleware(['auth:api'])->apiResource('/student', StudentController::class)->names('api.student');
Route::middleware(['auth:api'])->apiResource('/studentAdvisor', StudentAdvisorController::class)->names('api.studentAdvisor');
Route::middleware(['auth:api'])->apiResource('/studentData', StudentDataController::class)->names('api.studentData');
Route::middleware(['auth:api'])->apiResource('/studyPlan', StudyPlanController::class)->names('api.studyPlan');
Route::middleware(['auth:api'])->apiResource('/teacher', TeacherController::class)->names('api.teacher');
Route::middleware(['auth:api'])->apiResource('/teacherDegree', TeacherDegreeController::class)->names('api.teacherDegree');
Route::middleware(['auth:api'])->apiResource('/teacherStatus', TeacherStatusController::class)->names('api.teacherStatus');
