<?php

namespace App\Http\Controllers;

use App\Models\Drivers;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Driver\Driver;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Drivers::all();
        return view('drivers.index', ['drivers' => $drivers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $drivers = Drivers::all();
        return view('drivers.add',['drivers'=>$drivers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'username' => 'required',
        //     'driver_licence_nbr' => 'required',
        // ]);


        Drivers::create([
            'username'=>$request->username,
            'driver_licence_nbr'=>$request->driving_licence_number,
            'phone_number'=>$request->phone_number,
            'address'=>$request->address,
            'email'=>$request->email,
        ]);

        return redirect()->route('drivers.index')->with('success', 'Driver created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $drivers = Drivers::all();
        $driver = Drivers::where('driver_id', $id)->firstOrFail();  //not exist, it will throw a ModelNotFoundException.
    
        return view('drivers.update', ['driver' => $driver ,'drivers' => $drivers ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $drivers = Drivers::where('driver_id', $id)->firstOrFail();

   
    $drivers->update([
        'username' => $request->username,
        'driver_licence_nbr' => $request->driver_licence_nbr,
        'bus_id' => $request->bus_id,
        'phone_number' => $request->phone_number,
        'password' => $request->password
    ]);

  
    return redirect()->route('drivers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $parent = Drivers::where('parent_id', $id)->delete();
        $drivers = Drivers::all();
        return view('parents.index',['parents'=>$drivers])->with('success', 'Driver deleted successfully.');
    }
}
