<?php

namespace App\Http\Controllers;

use App\Models\Assistant;
use App\Models\child;
use App\Models\WayPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Models\Route;

class AssistantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assistants = Assistant::all();
        return view('assistants.index',['assistants'=>$assistants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $assistants = Assistant::all();
        return view('assistants.add',['assistants'=>$assistants]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            Assistant::create(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'phone_number'=>$request->phone_number,
                'password'=>Hash::make($request->password),
                'availability'=>$request->availability,
            ]
        );
        $assistants = Assistant::all();
        return view('assistants.index',['assistants'=>$assistants]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $assistants = Assistant::all();
        return view('assistants.delete',['id'=>$id,'assistants'=>$assistants]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $assistants = Assistant::all();
        $assistant = Assistant::find($id);
        $assistants = Assistant::all();
        return view('assistants.update',['assistant'=>$assistant,'assistants'=>$assistants,'assistants'=>$assistants]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Assistant::findOrFail($id)->update(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'phone_number'=>$request->phone_number,
                'password'=>Hash::make($request->password),
                'availability'=>$request->availability,
            ]
        );
        $assistants = Assistant::all();
        return view('assistants.index',['assistants'=>$assistants]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Assistant::find($id)->delete();
        $assistants = Assistant::all();
        return view('assistants.index',['assistants'=>$assistants]);

    }
    public function getChildAssistant($id){
        $child = child::findOrFail($id);
        $waypoint = WayPoint::findOrFail($child->child_id);
        $vehicle = Route::find($waypoint->route_id)->vehicle()->first();
        return $vehicle->assistant()->first();
    }
}
