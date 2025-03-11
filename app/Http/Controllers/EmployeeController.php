<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Notifications\MyNotification;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){
            $employees=Employee::all();
        return view('employee-dashboard',compact('employees'));
        }
        return redirect()->route('login');
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        if(Auth::check()){
            return view('employee-create');
        }
       else{
           return redirect()->route('login');
       }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 
        // Convert skills array to JSON before saving
        $validated = $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|unique:employees',
            'phone' => 'numeric|unique:employees|digits:10|required_if:email,null',
            'salary' => 'numeric|required',
            'skills' => 'required|array',
            'gender' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
    
      

        // Handle the photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('photos'), $photoName);
            $validated['photo'] = $photoName; // Save only the photo name

        }


        // Convert skills array to JSON before saving
        $validated['skills'] = json_encode($request->input('skills', []));

        Employee::create($validated);
        return redirect()->route('employees.create')->with('success', 'Employee added successfully')->withInput();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    
    {
        if(Auth::check()){
            return view('view-employee', ['employee' => Employee::find($id)]);

        }
        else{
            return redirect()->route('login');
        }
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {
        return view('edit-employee', ['employee' => Employee::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|unique:employees,email,' . $id,
            'phone' => 'numeric|unique:employees,phone,' . $id . '|digits:10|required_if:email,null',
            'salary' => 'numeric|required',
            'skills' => 'array',
        ]);

        // Handle the photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('photos'), $photoName);
            
            // Delete the old photo if it exists
            $employee = Employee::find($id);
            if ($employee->photo && file_exists(public_path('photos/' . $employee->photo))) {
                unlink(public_path('photos/' . $employee->photo));
            }

            $validated['photo'] = $photoName; // Save only the photo name
        }

        // Convert skills array to JSON before saving
        $validated['skills'] = json_encode($request->input('skills', []));

        // If no skills are selected, set an empty array
        Employee::find($id)->update($validated);
        return redirect()->route('employees.edit', $id)->with('success', 'Employee updated successfully');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        if ($employee->photo && file_exists(public_path('photos/' . $employee->photo))) {
            unlink(public_path('photos/' . $employee->photo));
        }
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
        
    }

    public function sendNotification(string $id){
        $user = Employee::find($id);
$user->notify(new MyNotification('This is a test notification.'));
    }
}
