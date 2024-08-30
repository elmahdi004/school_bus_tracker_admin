<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\child;
use App\Models\WayPoint;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = child::all();
        $parents = Parents::all();
        return view('students.index', ['students'=>$students , 'parents'=>$parents]);
    }

    /**
     * Show the form for creating a new student.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = child::all();
        $parents = Parents::all();

        return view('students.add',['students'=>$students,'parents'=>$parents]);
    }

    /**
     * Store a newly created student in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'username' => 'required',
        //     'age' => 'required',
        //     'nivScolaire' => 'required',
        //     'parent_id' => 'required',
        // ]);

        child::create([
            'username'=>$request->username,
            'age'=> $request->age,
            'nivScolaire'=>$request->nivScolaire,
            'parent_id'=>$request->parent_id
        ]);
        $students = child::all();

        return redirect()->route('students.index')
                         ->with('students',$students);
    }

    /**
     * Display the specified student.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = child::all();
        $student = child::find($id);
        $parents = Parents::all();
        return view('students.show', ['student'=>$student,'students'=>$students,'parents'=>$parents]);
    }

    /**
     * Show the form for editing the specified student.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(child $student)
    {
        $students = child::all();
        return view('students.update', ['student'=>$student,'students'=>$students]);
    }

    /**
     * Update the specified student in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        child::find($id)->update([
            'username' => $request->username,
            'age' => $request->age,
            'nivScolaire' => $request->nivScolaire,
            'parent_id' => $request->parent_id,
        ]);
        $students = child::all();

        return redirect()->route('students.index')
                         ->with('students',$students);
    }

    /**
     * Remove the specified student from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        child::find($id)->delete();
        $students = child::all();

        return redirect()->route('students.index')
        ->with('students',$students);
    }
}
