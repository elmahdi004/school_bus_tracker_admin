<?php

namespace App\Http\Controllers;

use App\Models\child;
use App\Models\Route;
use App\Models\WayPoint;
use Illuminate\Http\Request;

class WayPointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $route = Route::find($id);
        return view('routes.waypoints.index',['route'=>$route]);
    }

    public function create(Request $request)
    {

    }


    public function store(Request $request)
    {
        $waypoint = WayPoint::create([
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'route_id'=>$request->route_id
        ]);
        return $waypoint;
    }


    public function show(WayPoint $wayPoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WayPoint $wayPoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WayPoint $wayPoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WayPoint $wayPoint)
    {
        //
    }
    public function getWaypoints($id){
        $waypoints = WayPoint::where('route_id',$id)->get();
        return $waypoints;
    }
    public function getWaypointStudent($id){
        $students = WayPoint::find($id)->students()->get();
        return $students;
    }
    public function removeStudentWaypoint($student){
        child::where('child_id',$student)->update(
            [
                'waypoint_id'=>null
            ]
        );
    }
    public function getStudents(){
        $students = child::where('waypoint_id',null)->get();
        return $students;
    }
    public function addStudentToWaypoint(Request $request){
            foreach($request->students as $student ){
                        child::where('child_id',$student)->update([
                            'waypoint_id'=>$request->waypoint_id
                        ]);
            }
    }
}
