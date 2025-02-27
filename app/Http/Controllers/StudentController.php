<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $students = Student::all();
  
    return view('showStudent', compact('students'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addStudent');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('students.index');

     
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('viewStudents', ['student' => Student::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('editStudent', ['student' => Student::find($id)]);

    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      Student::where('id', $id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'updated_at' => now()
      ]);
      return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=Student::find($id);
        $user->delete();
        return redirect()->route('students.index');
        
    }
}
