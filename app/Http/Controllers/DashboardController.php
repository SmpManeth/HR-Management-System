<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Http\Requests\StoreDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        if (isset($request->month)) {
            $year = Carbon::parse($request->month)->year;
            $month = Carbon::parse($request->month)->month;

            //get the Employees with attendances for the month and year from attendances where date is year and month
            $employees = Employee::where('status', 'active')->with(['attendances' => function ($query) use ($year, $month) {
                $query->whereYear('date', $year)->whereMonth('date', $month);
            }])->get();
            // dd( $employees);
        } else {

            $employees = Employee::where('status', 'active')->with('attendances')->get();
        }




        $employees = $employees->map(function ($employee) {
            $statuses = ['Unplanned Leave', 'Planned Leave', 'Sick Leave', 'Half Day', 'Late Coming'];
            
            foreach ($statuses as $status) {
                $key = strtolower(str_replace(' ', '_', $status)) . 's';
                $employee->$key = $employee->attendances->where('status', $status)->count();
            }
        
            // Calculate total minutes worked
            $totalMinutes = $employee->attendances->reduce(function ($carry, $attendance) {
                if ($attendance->check_in && $attendance->check_out) {
                    $checkIn = Carbon::parse($attendance->check_in);
                    $checkOut = Carbon::parse($attendance->check_out);
        
                    // Check if the check-out time is on the next day
                    if ($checkOut->lt($checkIn)) {
                        $checkOut->addDay(); // Add one day to the check-out time
                    }
        
                    $minutes = $checkIn->diffInMinutes($checkOut);
                    return $carry + $minutes;
                }
                return $carry;
            }, 0);
        
            // Format total minutes to HH:MM
            $employee->total_hours_worked_formatted = sprintf('%02d:%02d', intdiv($totalMinutes, 60), $totalMinutes % 60);
            $employee->total_minutes_worked = $totalMinutes; // Save total minutes worked for each employee
        
            return $employee;
        });
        
        // Function to convert minutes to formatted HH:MM
        function formatMinutesToHHMM($minutes) {
            return sprintf('%02d:%02d', intdiv($minutes, 60), $minutes % 60);
        }
        
        // Calculate total worked minutes and format for each department
        $departments = ['Admin', 'Management', 'HR', 'IT', 'Web & Marketing', 'Sales', 'PH-Team'];
        $department_worked_mins = [];
        
        foreach ($departments as $department) {
            $total_minutes = $employees->where('department', $department)->sum('total_minutes_worked');
            $department_worked_mins[$department] = formatMinutesToHHMM($total_minutes);
        }
        
        // Access formatted total worked hours and minutes for each department
        $admin_total_worked_mins_formatted = $department_worked_mins['Admin'];
        $management_total_worked_mins_formatted = $department_worked_mins['Management'];
        $hr_total_worked_mins_formatted = $department_worked_mins['HR'];
        $it_total_worked_mins_formatted = $department_worked_mins['IT'];
        $web_and_marketing_total_worked_mins_formatted = $department_worked_mins['Web & Marketing'];
        $sales_total_worked_mins_formatted = $department_worked_mins['Sales'];
        $ph_team_total_worked_mins_formatted = $department_worked_mins['PH-Team'];


        //  dd($employees);
        return view('dashboard', compact('employees', 'admin_total_worked_mins_formatted' , 'management_total_worked_mins_formatted' , 'hr_total_worked_mins_formatted' , 'it_total_worked_mins_formatted' , 'web_and_marketing_total_worked_mins_formatted' , 'sales_total_worked_mins_formatted' , 'ph_team_total_worked_mins_formatted'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDashboardRequest $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
