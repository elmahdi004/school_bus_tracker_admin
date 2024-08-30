<?php

use App\Http\Controllers\AssistantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageVehicleController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\VolController;
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

// MapBox API 

Route::apiResource('routes',RouteController::class);
Route::post('routes/store',[RouteController::class,'store']);
Route::apiResource('waypoints',WayPointController::class);
Route::get('/route/{id}/waypoints',[WayPointController::class,'getWaypoints']);
Route::get('/waypoints/{id}/students',[WayPointController::class,'getWaypointStudent']);
Route::get('/waypoints/student/{id}',[WayPointController::class,'removeStudentWaypoint']);
Route::get('/route/students',[WayPointController::class,'getStudents']);
Route::post('/waypoint/students/add',[WayPointController::class,'addStudentToWaypoint']);







// ------------------ MOBILE API------------------------
Route::post('/login',[AuthController::class,'loginMobile']);
Route::get('/logout/parent',[AuthController::class,'logoutAsParent']);
Route::get('/logout/assistant',[AuthController::class,'logoutAsAssistant']);

Route::get('/vehicle/{id}/get-routes',[RouteController::class,'getRoutes']);

Route::get('/parent/{id}/children',[ParentsController::class,'getParentChildren']);

Route::get('/route/{id}/children',[RouteController::class,'getRouteChildren']);

Route::post('/vehicle/{id}/location',[LocationController::class,'updateMyLocation']);
Route::get('/parent/{id}/child/last-vol',[VolController::class,'getLastVol']);

Route::get('/parent/{id}/child/last-vol/child-status',[VolController::class,'getStatusOfMyChild']);
Route::get('/route/{id}/last-vol/status',[VolController::class,'getStatusOfLastVol']);
Route::get('/child/{id}/get-my-child-location',[LocationController::class,'getMyChildLocation']);
Route::get('/parent/{id}/get-my-notifications',[ParentsController::class,'getMyNotifications']);

Route::post('/assistant/{id}/route/{id_2}/create-incident',[IncidentController::class,'mobileCreateIncident']);

Route::get('/child/{id}/my-child-assistant',[AssistantController::class,'getChildAssistant']);



