<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $attendances = Attendence::with('employee')->orderBy('date', 'asc');

        // dd();

        if (!empty($request->user) && !empty($request->date)) {
            $attendances->where('employee_id', $request->user)
                ->where('date', $request->date);
        } elseif (!empty($request->month) && !empty($request->user)) {
            $attendances->where('employee_id', $request->user)
                ->where('date', 'like', $request->month . '%');
        } elseif (!empty($request->user)) {
            $attendances->where('employee_id', $request->user);
        } elseif (!empty($request->date)) {
            $attendances = Attendence::whereHas('employee', function ($query) {
                $query->where('status', 'active'); // Only include active employees
            })
                ->whereDate('date', $request->date) // Filter by the specific date provided in the request
                ->with(['employee' => function ($query) {
                    $query->where('status', 'active'); // Ensure only active employees are eager loaded
                }])
                ->orderBy('date', 'asc'); // Order by date in ascending order if needed
        } elseif (!empty($request->month)) {
            $attendances = Attendence::whereHas('employee', function ($query) {
                $query->where('status', 'active'); // Only include active employees
            })
                ->whereDate('date', 'like', $request->month . '%') // Filter by the specific date provided in the request
                ->with(['employee' => function ($query) {
                    $query->where('status', 'active'); // Ensure only active employees are eager loaded
                }])
                ->orderBy('date', 'asc'); // Order by date in ascending order if needed
        } else {
            $currentMonth = Carbon::now()->month;
            $currentYear = Carbon::now()->year;

            $attendances = Attendence::whereHas('employee', function ($query) {
                $query->where('status', 'active');
            })
                ->whereMonth('date', $currentMonth)
                ->whereYear('date', $currentYear)
                ->with('employee')
                ->orderBy('date', 'asc'); // Order by date in ascending order
        }

        $attendances = $attendances->get();



        $allEmployees = Employee::all();
        return view('pages.attendance.index', compact('allEmployees', 'attendances'));
    }

    public function generate(Request $request)
    {
        // dd($request->all());    


        $currentMonth = Carbon::now()->format('Y-m');
        $currentDate = Carbon::now()->format('Y-m-d');

        // Retrieve all employee IDs
        $employeeIds = Employee::pluck('id')->toArray();

        $allDays = [];
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now();

        for ($date = $startOfMonth; $date->lte($endOfMonth); $date->addDay()) {
            $allDays[] = $date->format('Y-m-d');
        }

        $newAttendanceRecords = [];


        foreach ($employeeIds as $employeeId) {
            // Retrieve attendance data for the current month for the specific employee
            $attendanceData = Attendence::where('employee_id', $employeeId)
                ->where('date', 'like', "$currentMonth%")
                ->pluck('date')
                ->toArray();




            // Check which days are missing for the current employee
            $missingDays = array_diff($allDays, $attendanceData);

            // Mark all missing days up to date as absent for the current employee
            foreach ($missingDays as $day) {
                if (Carbon::parse($day)->lte($currentDate)) {
                    $newAttendanceRecords[] = [
                        'employee_id' => $employeeId,
                        'date' => $day,
                        'check_in' => null,
                        'check_out' => null,
                        'status' => 'absent',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }

        // Insert missing attendance records
        if (!empty($newAttendanceRecords)) {
            Attendence::insert($newAttendanceRecords);
        }

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $attendances = Attendence::whereHas('employee', function ($query) {
            $query->where('status', 'active');
        })
            ->whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->with('employee')
            ->orderBy('date', 'asc') // Order by date in ascending order
            ->get();

        $allEmployees = Employee::all();
        return view('pages.attendance.index', compact('allEmployees', 'attendances'));
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
        // dd($request->all());

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
        } else {
            if ($check_in == null && $check_out == null) {
                $status = $validated['status'];
            } else if ($check_in <= $shift_time[0] && $check_out >= $shift_time[1]) {
                $status = 'Present';
            } else {
                $status = $validated['status'];
            }
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
    public function edit(Request $request, $attendence_id)
    {
        $attendence = Attendence::with('employee')->find($attendence_id);
        // dd($attendence);
        return view('pages.attendance.edit', compact('attendence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendence $attendence)
    {
        $validated = $request->validate([
            'id' => 'required',
            'date' => 'required',
            'employee_id' => 'required',
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



        $check_in = $request->check_in;
        $check_out = $request->check_out;

        $shift_time = array_map('trim', explode('-', $shift));

        //check if the employee is late or not by comparing the check_in time with the shift time[0] and checkout with shift time[1]
        $status = '';


        if ($check_in > $shift_time[0]) {
            $status = 'Late Coming';
        } else if ($check_in == null && $check_out == null) {
            $status =  $validated['status'];
        } else {
            $status = 'Present';
        }
        // dd($status);
        $validated['status'] = $status;
        $validated['shift'] = $shift;
        $attendence = Attendence::find($request->id);
        $attendence->update($validated);

        $attendances = Attendence::with('employee')->orderBy('date', 'asc')->get();
        $allEmployees = Employee::all();
        return view('pages.attendance.index', compact('allEmployees', 'attendances'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $Attendence = Attendence::find($id);
        $Attendence->delete();

        return back()->with('success', 'Attendence deleted successfully.');
    }
}
