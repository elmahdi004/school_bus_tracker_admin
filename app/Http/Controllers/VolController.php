<?php

namespace App\Http\Controllers;

use App\Models\child;
use App\Models\Parents;
use App\Models\Route;
use App\Models\Vol;
use App\Models\WayPoint;
use App\Notifications\NotifyParent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


class VolController extends Controller
{
    public function getLastVol($id){
    

        // $child = child::where('child_id',$id)->first();
        // $waypoint = WayPoint::find($child->waypoint_id);
        $route = Route::find($id);
        $waypoints = $route->waypoints()->get();
        $parents = [];
        $childrenList = [];
        foreach ($waypoints as $waypoint) {
            $children = $waypoint->students()->get();
            foreach ($children as $child) {
                $parent = Parents::where('parent_id',$child->parent_id)->first();
                $parent->id = $parent->parent_id;
                $parents[] = $parent;
                $childrenList[] = $child;
            }
        }
        $vol = $route->vols()->latest()->first();
        if($vol){
            if($vol->end_date == null){
                foreach ($childrenList as $child) {
                    $child->update([
                        'status'=>'hors du bus'
                    ]);
                    }
                Vol::find($vol->id)->update([
                    'end_date'=>Carbon::now()->setTimezone('+1'),
                ]);
                Notification::send($parents,new NotifyParent(true));
            }else{
                Vol::create([
                    'start_date'=>Carbon::now()->setTimezone('+1'),
                    'route_id'=>$route->id,
                    'created_at'=>Carbon::now()->setTimezone('+1'),
                ]);
                foreach ($childrenList as $child) {
                    $child->update([
                        'status'=>'en bus'
                    ]);
                    }
                Notification::send($parents,new NotifyParent(false));
            }
        }else{
            Vol::create([
                'start_date'=>Carbon::now()->setTimezone('+1'),
                'route_id'=>$route->id,
                'created_at'=>Carbon::now()->setTimezone('+1'),
            ]);
            foreach ($childrenList as $child) {
                $child->update([
                    'status'=>'en bus'
                ]);
                }
            Notification::send($parents,new NotifyParent(false));
        }
        return $parents;
    }

    public function getStatusOfMyChild($child_id){
        $child = child::where('child_id',$child_id)->first();
        $waypoint = WayPoint::find($child->waypoint_id);
        $route = Route::find($waypoint->route_id);
        $vol = $route->vols()->latest()->first();
        return response($vol,200);
    }

    public function getStatusOfLastVol($route_id){
        $route = Route::find($route_id);
        $vol = $route->vols()->latest()->first();
        return response($vol,200);
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
    public function show(Vol $vol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vol $vol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vol $vol)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vol $vol)
    {
        //
    }
}
