<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmployeeRequest;
use App\services\EmployeeServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Notifications\MyNotification;
use App\Http\Requests\EmployeeValidateRequest;

class EmployeeController extends Controller
{
    public function __construct(public EmployeeServices $employeeServices)
    {
        
    }
    public function index()
    {
        
           $employees= $this->employeeServices->getAllEmployees();
        return view('employee-dashboard',compact('employees'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
            return view('employee-create');
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeValidateRequest $request)
    {
        // Extract all request data
        $data = $request->all(); 
    
        // Handle the photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('photos'), $photoName);
            $data['photo'] = $photoName; // Save only the photo name
        }
    
        // Convert skills array to JSON before saving
        $data['skills'] = json_encode($request->input('skills', []));
    
        // Store in the database
        $this->employeeServices->createEmployee($data);
    
        return redirect()->route('employees.create')
            ->with('success', 'Employee added successfully')
            ->withInput();
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    
    {
        
            return view('view-employee', ['employee' => $this->employeeServices->getEmployeeById($id)]);

       
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {
        return view('edit-employee', ['employee' => $this->employeeServices->getEmployeeById($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( UpdateEmployeeRequest $request, string $id)
    {
       $data= $request->all();

        // Handle the photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('photos'), $photoName);
            
            // Delete the old photo if it exists
            $employee = $this->employeeServices->getEmployeeById($id);
            if ($employee->photo && file_exists(public_path('photos/' . $employee->photo))) {
                unlink(public_path('photos/' . $employee->photo));
            }

            $data['photo'] = $photoName; // Save only the photo name
        }

        // Convert skills array to JSON before saving
        $data['skills'] = json_encode($request->input('skills', []));

        // If no skills are selected, set an empty array
      $this->employeeServices->updateEmployee($data, $id);
        return redirect()->route('employees.edit', $id)->with('success', 'Employee updated successfully');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = $this->employeeServices->getEmployeeById($id);
        if ($employee->photo && file_exists(public_path('photos/' . $employee->photo))) {
            unlink(public_path('photos/' . $employee->photo));
        }
        $this->employeeServices->deleteEmployee($id);
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
        
    }

    public function sendNotification(string $id){
        $user = $this->employeeServices->getEmployeeById($id);
$user->notify(new MyNotification('This is a test notification.'));
    }
}
