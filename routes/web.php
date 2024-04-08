<?php

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

Route::get('/', function (Request $request) {
    $studentCount = child::count();
    $driversCount = Drivers::count();
    return view('welcome', [
        'studentCount' => $studentCount,
        'driversCount'=> $driversCount
    ]); 
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

Route::get('/vehicles',function(){
    return view('vehicles.index');
})->name('vehicles');

Route::get('/incidents',function(){
    return view('incidents.index');
})->name('incidents');

Route::get('/routes',function(){
    return view('routes.index');
})->name('routes');

Route::get('/reports',function(){
    return view('reports.index');
})->name('reports');
