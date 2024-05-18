<?php

namespace App\Http\Controllers;

use App\Models\child;
use App\Models\Route;
use Illuminate\Http\Request;
use App\Models\Route as ModelsRoute;
use App\Models\Vehicle;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routes = Route::with('vehicle')->get();
        return view('routes.index',['routes'=>$routes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $routes = Route::with('vehicle')->get();
        $vehicles = Vehicle::all();
        return view('routes.add',['routes'=>$routes,'vehicles'=>$vehicles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ModelsRoute::create([
            'name'=>$request->name,
            'distance'=>$request->distance / 1000,
            'start_point_lat'=>$request->sourceCoordinates['lat'],
            'start_point_lng'=>$request->sourceCoordinates['lng'],
            'end_point_lat'=>$request->destinationCoordinates['lat'],
            'end_point_lng'=>$request->destinationCoordinates['lng'],
            'vehicle_id'=>$request->vehicle
        ]);   
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Route::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $route = Route::findOrFail($id);
        $vehicles = Vehicle::all();
        $routes = Route::with('vehicle')->get();
        return view('routes.update',['route'=>$route,'vehicles'=>$vehicles,'routes'=>$routes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        ModelsRoute::findOrFail($id)->update([
            'name'=>$request->name,
            'distance'=>$request->distance / 1000,
            'start_point_lat'=>$request->sourceCoordinates['lat'],
            'start_point_lng'=>$request->sourceCoordinates['lng'],
            'end_point_lat'=>$request->destinationCoordinates['lat'],
            'end_point_lng'=>$request->destinationCoordinates['lng'],
            'vehicle_id'=>$request->vehicle
        ]); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $routes = Route::all();
        return view('routes.delete',['routes'=>$routes,'id'=>$id]);
    }
    public function destroy($id)
    {
        Route::findOrFail($id)->delete();
        return redirect()->route('routes.index');
    }

    public function getRoutes($vehilceId){
        return response(Vehicle::find($vehilceId)->routes()->get(),200);
    }
    public function getRouteChildren($id){
        $waypoints =  Route::find($id)->waypoints()->get();
        $data = collect(); 
            foreach ($waypoints as $waypoint ) {
            $children = child::where('waypoint_id',$waypoint->id)->get();
            $data = $data->merge($children);
        }
        return response($data->all(),200);
        // return child::where('waypoint_id',$waypoints[0]->id)->get(); ;
    }
}
