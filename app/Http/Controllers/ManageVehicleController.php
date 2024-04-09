<?php

namespace App\Http\Controllers;

use App\Models\BusMaintenance;
use App\Models\Vehicle;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Carbon;

class ManageVehicleController extends Controller
{
    public function details($id){
        $vehicle = Vehicle::find($id);
        $busMaintenancesData = $vehicle->busMaintenances()->get();
        $today = Carbon::now();
        foreach ($busMaintenancesData as $index => $busMaintenance) {
            $date = Carbon::parse($busMaintenance->date);
            $diff = $date->diffForHumans($today);
            $busMaintenancesData[$index] = ['busMaintenance' => $busMaintenance,'remaining_time' => $diff,'maintenance_type'=>$busMaintenance->busMaintenanceType()->first()];
        };
        $busMaintenancesCollection = collect($busMaintenancesData);
        $busMaintenancesSorted = $busMaintenancesCollection->sortByDesc(function ($item) {
            return $item['remaining_time'];
        });
        return view('vehicles.details',
            [
            'idNav'=>1,
            'vehicle'=>$vehicle,
            'busMaintenances'=>$busMaintenancesSorted,
        ]);
        // return $busMaintenancesData[0];
    }

}