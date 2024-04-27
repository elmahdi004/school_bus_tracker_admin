<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageVehicleController;
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
// Route::get('/details',function(){
    // $vehicles = Vehicle::all();
    // $data = [];
    // foreach($vehicles as $vehicle){
    //         $data[] = $vehicle->with('driver')->get();
    // }
    // return $data;
    // return Vehicle::with('driver')->get();
// });
