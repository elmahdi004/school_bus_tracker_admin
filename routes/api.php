<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageVehicleController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\WayPointController;
use App\Models\BusMaintenance;
use App\Models\Vehicle;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// fetch google maps api
Route::apiResource('routes',RouteController::class);
Route::post('routes/store',[RouteController::class,'store']);
Route::apiResource('waypoints',WayPointController::class);
Route::get('/route/{id}/waypoints',[WayPointController::class,'getWaypoints']);
Route::get('/waypoints/{id}/students',[WayPointController::class,'getWaypointStudent']);
Route::get('/waypoints/student/{id}',[WayPointController::class,'removeStudentWaypoint']);
Route::get('/route/students',[WayPointController::class,'getStudents']);
Route::post('/waypoint/students/add',[WayPointController::class,'addStudentToWaypoint']);


