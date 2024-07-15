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
            $employees = Employee::with(['attendances' => function ($query) use ($year, $month) {
                $query->whereYear('date', $year)->whereMonth('date', $month);
            }])->get();
            // dd( $employees);
        } else {
    
            $employees = Employee::with('attendances')->get();
        }



        //get all the unplaneed leaves , plannned Leaves ,Sick Leaves , Halfdays , an late Comings for each employee from attendances
        $employees->map(function ($employee) {
            $employee->unplanned_leaves = $employee->attendances->where('status', 'Unplanned Leave')->count();
            $employee->planned_leaves = $employee->attendances->where('status', 'Planned Leave')->count();
            $employee->sick_leaves = $employee->attendances->where('status', 'Sick Leave')->count();
            $employee->halfdays = $employee->attendances->where('status', 'Half Day')->count();
            $employee->late_comings = $employee->attendances->where('status', 'Late Coming')->count();

            // Calculating total hours worked for 'Present' and 'Late Coming' statuses
            $employee->total_hours_worked = $employee->attendances->whereIn('status', ['Present', 'Late Coming'])->reduce(function ($carry, $attendance) {
                if ($attendance->check_in && $attendance->check_out) {
                    $checkIn = Carbon::parse($attendance->check_in);
                    $checkOut = Carbon::parse($attendance->check_out);
                    $hours = $checkIn->diffInHours($checkOut);
                    return $carry + $hours;
                }
                return $carry;
            }, 0); // Start reducing with an initial value of 0

            return $employee;
        });




        return view('dashboard', compact('employees'));
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
