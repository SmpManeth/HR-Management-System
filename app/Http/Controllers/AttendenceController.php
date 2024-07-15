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

        $validated = $request->validate([
            'employee_id' => 'required',
            'date' => 'required|unique:attendences,date,NULL,id,employee_id,' . $request->employee_id,
            'check_in' => 'nullable', // 'check_in' => 'required|date_format:H:i:s',
            'check_out' => 'nullable',
            'status' => 'nullable'
        ]);

        // Fget the selected date and check whether its a weekday or a week end. need to check whether employee is late or not by comparing the check_in time with the shift time
        $selectedDay = date('l', strtotime($request->date));
        $employee_id = $request->employee_id;
        $employee = Employee::find($employee_id);

        if ($selectedDay == 'Saturday' || $selectedDay == 'Sunday') {
            $shift = $employee->weekend_shift;
        } else {
            $shift = $employee->weekday_shift;
        }

        if ($shift == null) {
        }


        $check_in = $request->check_in;
        $check_out = $request->check_out;

        $shift_time = array_map('trim', explode('-', $shift));

        //check if the employee is late or not by comparing the check_in time with the shift time[0] and checkout with shift time[1]
        $status = '';
        if ($check_in > $shift_time[0]) {
            $status = 'Late Coming';
        } else if ($check_in == null) {
            $status =  $validated['status'];
        }
        else{
            $status = 'Present';
        }
        $validated['status'] = $status;
        $validated['shift'] = $shift;
        Attendence::create($validated);

        return redirect()->route('employees.index')->with('success', 'Attendence Marked Successfully');
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
