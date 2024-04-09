<?php

use App\Http\Controllers\BusMaintenanceController;
use App\Http\Controllers\ManageVehicleController;
use App\Http\Controllers\VehicleController;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',function(){
    return view('auth.index');
})->name('login');

Route::get('/students',function(){
    return view('students.index');
})->name('students');

Route::get('/drivers',function(){
    return view('drivers.index');
})->name('drivers');

Route::get('/parents',function(){
    return view('parents.index');
})->name('parents');

Route::get('/assistants',function(){
    return view('assistants.index');
})->name('assistants');

// ------------ Vehicles Routes 

Route::resource('vehicles',VehicleController::class);
Route::prefix('/vehicles')->group(function(){
    Route::get('/details/{id}',[ManageVehicleController::class,'details'])->name('vehicles.details');
});
// ------------ Vehicles End Routes 

// -------------- maintenance Routes
Route::resource('maintenance',BusMaintenanceController::class);
Route::prefix('/maintenance')->group(function(){
    Route::post('/{vehicle}/add',[BusMaintenanceController::class,'add'])->name('maintenance.add');
    Route::get('/{id}/vehicle/{vehicle_id}/done',[BusMaintenanceController::class,'done'])->name('maintenance.done');
    Route::delete('/{id}/{vehicle_id}/maintenance-done',[BusMaintenanceController::class,'maintenanceDone'])->name('maintenance.MaintenanceDone');
    Route::get('/{id}/vehicle/{vehicle_id}/modify',[BusMaintenanceController::class,'modify'])->name('maintenance.modify');
    Route::post('/{id}/vehicle/{vehicle_id}/maintenance-modify',[BusMaintenanceController::class,'MaintenanceModify'])->name('maintenance.maintenance-modify');


});
// -------------- maintenance end



Route::get('/incidents',function(){
    return view('incidents.index');
})->name('incidents');

Route::get('/routes',function(){
    return view('routes.index');
})->name('routes');

Route::get('/reports',function(){
    return view('reports.index');
})->name('reports');
