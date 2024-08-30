<?php

namespace App\Http\Controllers;

use App\Models\child;
use App\Models\Location;
use App\Models\Route;
use App\Models\Vehicle;
use App\Models\WayPoint;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function updateMyLocation(Request $request,$id){
        $postion =  Vehicle::find($id)->location()->first();
        Location::find($postion->id)->update([
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude
        ]);
        return response('',200);
    }
    /**
     * Display a listing of the resource.
     */
    public function getMyChildLocation($child_id){
        $child = child::where('child_id',$child_id)->first();
        $waypoint = WayPoint::find($child->waypoint_id);
        $vehicle = Route::find($waypoint->route_id)->vehicle()->first();
        $location = $vehicle->location()->first();
        return response(['location'=>$location,'route'=>Route::find($waypoint->route_id)],200);

    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        //
    }
}
