<?php

use App\Http\Controllers\AssistantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusMaintenanceController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\ManageVehicleController;
use App\Http\Controllers\VehicleController;
use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\LoginRedirectMiddleware;
use App\Models\Assistant;
use App\Models\Vehicle;

use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\View;
use App\Models\child;
use App\Models\Drivers;
use App\Models\Parents;
use Illuminate\Http\Request;

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






Route::get('/',function(){
    return view('auth.index');
})->middleware(LoginRedirectMiddleware::class)->name('login');
Route::post('/login-check',[AuthController::class,'login'])->name('auth-check');
Route::middleware(AuthCheck::class)->group(function(){
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/dashboard', function (Request $request) {
        $studentCount = child::count();
        $driversCount = Drivers::count();
        $parentsCount = Parents::count();
        $assistanceCount = Assistant::count();
        return view('welcome', [
            'studentCount' => $studentCount,
            'driversCount'=> $driversCount,
            'parentsCount' => $parentsCount,
            'assistanceCount' => $assistanceCount
        ]); 
    })->name('dashboard');
    Route::get('/students',function(){
        return view('students.index');
    })->name('students');
    

  // ------------ Driver Routes 

Route::get('/drivers',[DriversController::class,"index"])->name('drivers.index');

Route::get('/drivers/create', [DriversController::class, 'create'])->name('drivers.create');
Route::post('/drivers', [DriversController::class, 'store'])->name('drivers.store');

Route::prefix('/drivers')->group(function(){
    Route::get('/edit/{id}',[DriversController::class,"edit"])->name('drivers.edit');
    Route::put('/update/{id}', [DriversController::class, "update"])->name('drivers.update');
});

Route::prefix('/drivers')->group(function(){
    Route::get('/show/{id}',[DriversController::class,"show"])->name('drivers.show');
});

Route::delete('/drivers/{id}', [DriversController::class, 'destroy'])->name('driver.delete');



// ------------ Parents Routes 
Route::get('/parents',[ParentsController::class,"index"])->name('parents.index');

Route::get('/parents/create', [ParentsController::class, 'create'])->name('parents.create');
Route::post('/parents', [ParentsController::class, 'store'])->name('parents.store');

Route::prefix('/parents')->group(function(){
    Route::get('/edit/{id}',[ParentsController::class,"edit"])->name('parents.edit');
    Route::put('/update/{id}', [ParentsController::class, "update"])->name('parents.update');
    Route::get('/show/{id}',[ParentsController::class,"show"])->name('parents.show');
    Route::delete('/{id}', [ParentsController::class, 'destroy'])->name('parents.delete');
});





    
    Route::resource('assistants',AssistantController::class);

    
    // ------------ Vehicles Routes 
    
    Route::resource('vehicles',VehicleController::class);
    Route::prefix('/vehicles')->group(function(){
        Route::get('/details/{id}',[ManageVehicleController::class,'details'])->name('vehicles.details');
        Route::get('/details/{id}/notification/{notification}',[ManageVehicleController::class,'detailsWithNotification'])->name('vehicles.detailsWithNotification');
        Route::get('/details/notification/allAsRead',[ManageVehicleController::class,'notificationMarkAllAsRead'])->name('vehicles.notificationMarkAllAsRead');
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
});

