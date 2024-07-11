<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use App\Http\Requests\StoreAttendenceRequest;
use App\Http\Requests\UpdateAttendenceRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Queue\Middleware\ThrottlesExceptions;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get employees with attendances 
        $employees = Employee::with('attendances')->get();
        return view('pages.attendance.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($emp_id)
    {
        $employee = Employee::find($emp_id);
        return view('pages.attendance.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //   dd($request->all());
        $validated = $request->validate([
            'employee_id' => 'required',
            'date' => 'required', // 'date' => 'required|date_format:Y-m-d',
            'check_in' => 'nullable', // 'check_in' => 'required|date_format:H:i:s',
            'check_out' => 'nullable',
            'status' => 'required',
            'shift' => 'required',
        ]);
        

        Attendence::create($validated);

        return redirect()->route('employees.index')->with('success', 'Attendence created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendence $attendence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendence $attendence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendenceRequest $request, Attendence $attendence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendence $attendence)
    {
        //
    }
}
