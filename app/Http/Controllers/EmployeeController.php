<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Employee::orderBy('Employee_ID', 'asc');
        
        // Filter by status if provided
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }
        
        return view('pages.employees.index')->with([
            'employees' => $query->get(),
            'selectedStatus' => $request->get('status', 'all'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Employee_ID' => 'required',
            'First_Name' => 'required',
            'Last_Name' => 'required',
            'Stage_name' => 'required',
            'email' => 'required',
            'dob' => 'required' ,
            'nic' => 'required',
            'Address' => 'required',
            'Contact_Number' => 'required',
            'employee_desgination' => 'required',
            'work_location' => 'required',
            'joined_date' => 'required',
            'department' => 'required',
            'weekday_shift' => 'nullable',
            'weekend_shift' => 'nullable',
            'total_leaves_per_month' => 'required',
            'status' => 'required',
            'Emergency_Contact_First_Name' => 'nullable',
            'Emergency_Contact_Last_Name' => 'nullable',
            'Emergency_Contact_Contact_no' => 'nullable',
            'Emergency_Contact_Relationship' => 'nullable',
            'Emergency_Contact_Address' => 'nullable'
        ]);

        // dd($validatedData);

        //create an Employee with validated data
        Employee::create($validatedData);
        return redirect()->route('employees.index')->with('success', 'Employee Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('pages.employees.edit')->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        // Retrieve all destinations with their associated images
        $validatedData = $request->validate([
            'Employee_ID' => 'required',
            'First_Name' => 'required',
            'Last_Name' => 'required',
            'Stage_name' => 'required',
            'email' => 'required',
            'dob' => 'required' ,
            'nic' => 'required',
            'Address' => 'required',
            'Contact_Number' => 'required',
            'employee_desgination' => 'required',
            'work_location' => 'required',
            'joined_date' => 'required',
            'department' => 'required',
            'weekday_shift' => 'nullable',
            'weekend_shift' => 'nullable',
            'total_leaves_per_month' => 'required',
            'status' => 'required',
            'Emergency_Contact_First_Name' => 'nullable',
            'Emergency_Contact_Last_Name' => 'nullable',
            'Emergency_Contact_Contact_no' => 'nullable',
            'Emergency_Contact_Relationship' => 'nullable',
            'Emergency_Contact_Address' => 'nullable'
        ]);


        $employee->update($validatedData);
        return redirect()->route('employees.index')->with('success', 'Employee Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $employee = Employee::find($id);

        $employee->delete();

        return back()->with('success', 'Employee deleted successfully.');
    }
}
