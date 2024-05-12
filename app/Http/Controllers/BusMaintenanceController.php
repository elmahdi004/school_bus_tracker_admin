<?php

namespace App\Http\Controllers;

use App\Models\Administration;
use App\Models\BusMaintenance;
use App\Models\MaintenanceType;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Notifications\ReminderNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Carbon;

class BusMaintenanceController extends Controller
{

    public function add(Request $request,$vehicle)
    {
        $maintenance = BusMaintenance::create([
            'vehicle_id'=>$vehicle,
            'maintenance_type_id'=>intval($request->maintenace_type),
            'date'=>$request->date,
            'description'=>$request->description
        ]);
        // $admins = Administration::all();
        // Notification::send($admins,new ReminderNotification($maintenance->vehicle_id,$maintenance->vehicle->name,$maintenance->busMaintenanceType->name));
        $vehicle = Vehicle::find($vehicle);
        $busMaintenancesData = $vehicle->busMaintenances()->with('busMaintenanceType')->get();
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
            'idNav'=>2,
            'vehicle'=>$vehicle,
            'assistant'=>$vehicle->assistant()->get(),
            'driver'=>$vehicle->driver()->get(),
            'routes'=>$vehicle->routes()->get(),
            'busMaintenances'=>$busMaintenancesSorted,
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        $maintenanceType = MaintenanceType::all();
        $busMaintenancesData = $vehicle->busMaintenances()->with('busMaintenanceType')->get();
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
        return view('vehicles.maintenance.add',
            [
            'idNav'=>2,
            'vehicle'=>$vehicle,
            'assistant'=>$vehicle->assistant()->get(),
            'driver'=>$vehicle->driver()->get(),
            'routes'=>$vehicle->routes()->get(),
            'busMaintenances'=>$busMaintenancesSorted,
            'maintenanceType'=>$maintenanceType
        ]);
    }
    public function modify($id,$vehicle_id)
    {
            $vehicle = Vehicle::find($vehicle_id);
            $maintenanceType = MaintenanceType::all();
            $item = BusMaintenance::find($id);
            $busMaintenancesData = $vehicle->busMaintenances()->with('busMaintenanceType')->get();
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
            $date = Carbon::parse($item->date);
            $date = $date->format('Y-m-d');
            return view('vehicles.maintenance.update',
                [
                'idNav'=>2,
                'vehicle'=>$vehicle,
                'assistant'=>$vehicle->assistant()->get(),
                'driver'=>$vehicle->driver()->get(),
                'routes'=>$vehicle->routes()->get(),
                'busMaintenances'=>$busMaintenancesSorted,
                'maintenanceType'=>$maintenanceType,
                'busMaintenance'=>$item,
                'date'=>$date
            ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function MaintenanceModify(Request $request,$id,$vehicle_id)
    {
        BusMaintenance::find($id)->update(
            [
                'vehicle_id'=>$vehicle_id,
                'maintenance_type_id'=>$request->maintenace_type,
                'date'=>$request->date,
                'description'=>$request->description
            ]
        );
            $vehicle = Vehicle::find($vehicle_id);
            $maintenanceType = MaintenanceType::all();
            $busMaintenancesData = $vehicle->busMaintenances()->with('busMaintenanceType')->get();
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
                'idNav'=>2,
                'vehicle'=>$vehicle,
                'assistant'=>$vehicle->assistant()->get(),
                'driver'=>$vehicle->driver()->get(),
                'routes'=>$vehicle->routes()->get(),
                'busMaintenances'=>$busMaintenancesSorted,
                'maintenanceType'=>$maintenanceType,
            ]);
        
    }

    public function done($id,$vehicle_id)
    {
            $vehicle = Vehicle::find($vehicle_id);
            $maintenanceType = MaintenanceType::all();
            $item = BusMaintenance::find($id);
            $item = BusMaintenance::find($id);
            $busMaintenancesData = $vehicle->busMaintenances()->with('busMaintenanceType')->get();
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
            $date = Carbon::parse($item->date);
            $date = $date->format('Y-m-d');
            return view('vehicles.maintenance.done',
                [
                'idNav'=>2,
                'vehicle'=>$vehicle,
                'assistant'=>$vehicle->assistant()->get(),
                'driver'=>$vehicle->driver()->get(),
                'routes'=>$vehicle->routes()->get(),
                'busMaintenances'=>$busMaintenancesSorted,
                'maintenanceType'=>$maintenanceType,
                'busMaintenance'=>$item,
            ]);
        
    }
    public function maintenanceDone($id,$vehicle_id)
    {
        BusMaintenance::findOrFail($id)->delete();
            $vehicle = Vehicle::find($vehicle_id);
            $maintenanceType = MaintenanceType::all();
            $busMaintenancesData = $vehicle->busMaintenances()->with('busMaintenanceType')->get();
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
            // return redirect()->route('vehicles.details',['id'=>$vehicle->id,'vehicle'=>$vehicle,
            // 'busMaintenances'=>$busMaintenancesSorted,
            // 'maintenanceType'=>$maintenanceType,'idNav'=>2,]);
            return view('vehicles.details',
                [
                'vehicle'=>$vehicle,
                'assistant'=>$vehicle->assistant()->get(),
                'driver'=>$vehicle->driver()->get(),
                'routes'=>$vehicle->routes()->get(),
                'busMaintenances'=>$busMaintenancesSorted,
                'maintenanceType'=>$maintenanceType,
                'idNav'=>2,
            ]);
        
    }
}
