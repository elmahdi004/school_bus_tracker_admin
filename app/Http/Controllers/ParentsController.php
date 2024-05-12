<?php

namespace App\Http\Controllers;

use App\Http\Resources\parentRessource;
use App\Models\Parents;
use Illuminate\Http\Request;

class ParentsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parents = Parents::all();
        return view('parents.index',['parents'=>$parents]);
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Parents::all();
        return view('parents.add',['parents'=>$parents]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'contact_num' => 'required',
            'email' => 'required|email|unique:parents',
            'address' => 'required',
            'password' => 'required|min:6',
        ]);
    
        
        $validatedData['password'] = bcrypt($validatedData['password']);
    
        // Create a new parent record
        $parent = Parents::create($validatedData);
    
        // Redirect or return a response
        return redirect()->route('parents.index')->with('success', 'Parent created successfully.');
    }

     /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $parents = Parents::all();
        $parent = Parents::where('parent_id', $id)->firstOrFail(); ;
        return view('parents.delete', ['parent' => $parent, 'id' => $id ,'parents' => $parents]);
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $parents = Parents::all();
        $parent = Parents::where('parent_id', $id)->firstOrFail();  //not exist, it will throw a ModelNotFoundException.
    
        return view('parents.update', ['parent' => $parent ,'parents' => $parents ]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{

    $parent = Parents::where('parent_id', $id)->firstOrFail();

    $parent->update([
        'username' => $request->username,
        'contact_num' => $request->contact_num,
        'email' => $request->email,
        'address' => $request->address,
        'password' => $request->password
    ]);

   
    return redirect()->route('parents.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $parent = Parents::where('parent_id', $id)->delete();
        $parents = Parents::all();
        return view('parents.index',['parents'=>$parents]);
    }
}
