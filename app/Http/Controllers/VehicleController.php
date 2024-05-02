<?php

namespace App\Http\Controllers;

use App\Models\Assistant;
use App\Models\Drivers;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index',['vehicles'=>$vehicles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicles = Vehicle::all();
        $assistants = Assistant::all();
        $drivers = Drivers::all();
        return view('vehicles.add',['vehicles'=>$vehicles,'assistants'=>$assistants,'drivers'=>$drivers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $position = Location::create([
            'latitude'=>32.307529,
            'longitude'=>9.216125
        ]);
            Vehicle::create(
            [
                'name'=>$request->name,
                'registration plate'=>$request['registration_plate'],
                'model'=>$request->model,
                'number of seats'=>$request['number_of_seats'],
                'status'=>$request->status,
                'position_id'=>$position->id,
                'assistant_id'=>$request->assistant,
                'driver_id'=>$request->driver
            ]
        );
        $vehicles = Vehicle::all();
        return view('vehicles.index',['vehicles'=>$vehicles]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vehicles = Vehicle::all();
        return view('vehicles.delete',['id'=>$id,'vehicles'=>$vehicles]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehicles = Vehicle::all();
        $vehicle = Vehicle::find($id);
        $assistants = Assistant::all();
        $drivers = Drivers::all();
        return view('vehicles.update',['vehicle'=>$vehicle,'vehicles'=>$vehicles,'assistants'=>$assistants,'drivers'=>$drivers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Vehicle::findOrFail($id)->update(
            [
                'name'=>$request->name,
                'registration plate'=>$request['registration_plate'],
                'model'=>$request->model,
                'number of seats'=>$request['number_of_seats'],
                'status'=>$request->status,
                'assistant_id'=>$request->assistant,
                'driver_id'=>$request->driver
            ]
        );
        $vehicles = Vehicle::all();
        return view('vehicles.index',['vehicles'=>$vehicles]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Vehicle::find($id)->delete();
        $vehicles = Vehicle::all();
        return view('vehicles.index',['vehicles'=>$vehicles]);

    }

}
