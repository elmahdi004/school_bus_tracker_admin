<?php

namespace App\Http\Controllers;

use App\Models\BusMaintenance;
use App\Models\Notification;
use App\Models\Vehicle;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Illuminate\Support\Facades\Auth;

class ManageVehicleController extends Controller
{
    public function details($id,$notification = null){
        if($notification != null){
                $notification->markAsRead();
                return "Done";
        }
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
            'assistant'=>$vehicle->assistant()->get(),
            'driver'=>$vehicle->driver()->get(),
            'routes'=>$vehicle->routes()->get(),
            'busMaintenances'=>$busMaintenancesSorted,
        ]);
        // return response([
        //                 [
        //     'idNav'=>1,
        //     'vehicle'=>$vehicle,
        //     'assistant'=>$vehicle->assistant()->get(),
        //     'busMaintenances'=>$busMaintenancesSorted,
        // ]
        // ]);
    }
    public function detailsWithNotification($id,$notificationId){
        $notification = Notification::find($notificationId);
        $notification->update(['read_at' => now()]);
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
            'assistant'=>$vehicle->assistant()->get(),
            'driver'=>$vehicle->driver()->get(),
            'busMaintenances'=>$busMaintenancesSorted,
        ]);
    }
    public function notificationMarkAllAsRead(){
        Auth::guard('administrations')->user()->unreadNotifications->markAsRead();
        return redirect()->route('dashboard');
    }
}