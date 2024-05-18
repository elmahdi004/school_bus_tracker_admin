<?php

namespace App\Http\Controllers;

use App\Models\Administration;
use App\Models\Incident;
use App\Notifications\IncidentNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Models\Route;
use App\Models\Parents;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function notifyParents($id){
        
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
    public function show(Incident $incident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incident $incident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incident $incident)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incident $incident)
    {
        //
    }
    public function mobileCreateIncident(Request $request,$assistant_id,int $route_id){


        $route = Route::find($route_id);
        $waypoints = $route->waypoints()->get();
        $parents = [];
        foreach ($waypoints as $waypoint) {
            $children = $waypoint->students()->get();
            foreach ($children as $child) {
                $parent = Parents::where('parent_id',$child->parent_id)->first();
                $parent->id = $parent->parent_id;
                $parents[] = $parent;
            }
        }
        $admins = Administration::all();
        Notification::send($parents,new IncidentNotify($request->type,$request->description,$route_id));
        Notification::send($admins,new IncidentNotify($request->type,$request->description,$route_id));
        
             Incident::create([
                'type'=>$request->type,
                'description'=>$request->description,
                'assistant_id'=>$assistant_id,
                'route_id'=>$route_id,
            ]);





    }
    
}
