<x-app-layout>
    <h2 class="mb-4 text-xl text-center underline font-semibold leading-none text-gray-900 dark:text-white">Attendance Summary</h2>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">

        <form action="{{ route('attendances.search')}}" method="post">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <input type="month" name="month" id="month" class="block w-full px-4 py-2 text-sm text-gray-900 bg-gray-200 border border-gray-200 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 focus:outline-none dark:bg-gray-800 dark:text-gray-300 dark:border-gray-900" value="{{ old('month') }}">
                </div>
                <div class="flex items">
                    <button type="submit" class="px-4 py-2 text-sm text-white bg-primary-600 rounded-lg hover:bg-primary-700">Filter</button>
                </div>
            </div>
        </form>

    </section>

    <!-- Sales -->
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto">
            <h2 class="mb-4 text-xl font-semibold leading-none text-gray-900 dark:text-white">Sales Summary</h2>
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto pb-[160px]">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Employee ID</th>
                                <th scope="col" class="px-4 py-3">Stage Name</th>
                                <th scope="col" class="px-4 py-3">Planned Leave</th>
                                <th scope="col" class="px-4 py-3">Unplanned Leave</th>
                                <th scope="col" class="px-4 py-3">Sick Leave</th>
                                <th scope="col" class="px-4 py-3">Half Days</th>
                                <th scope="col" class="px-4 py-3">Late Comings</th>
                                <th scope="col" class="px-4 py-3">No. Of Hours Worked</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $planned_leaves_Sales = 0;
                            $unplanned_leaves_Sales = 0;
                            $sick_leaves_Sales = 0;
                            $half_days_Sales = 0;
                            $late_comings_Sales = 0;
                            @endphp
                            @foreach ($employees as $employee)
                            @if ($employee->department == 'Sales')
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $employee->Employee_ID}}</th>
                                <td class="px-4 py-3">{{ $employee->Stage_name}}</td>
                                <td class="px-4 py-3">{{ $employee->planned_leaves}}</td>
                                <td class="px-4 py-3">{{ $employee->unplanned_leaves}}</td>
                                <td class="px-4 py-3">{{ $employee->sick_leaves}}</td>
                                <td class="px-4 py-3">{{ $employee->half_days}}</td>
                                <td class="px-4 py-3">{{ $employee->late_comings}}</td>
                                <td class="px-4 py-3">{{ $employee->total_hours_worked_formatted}}</td>
                            </tr>
                            @php
                            $planned_leaves_Sales += $employee->planned_leaves;
                            $unplanned_leaves_Sales += $employee->unplanned_leaves;
                            $sick_leaves_Sales += $employee->sick_leaves;
                            $half_days_Sales += $employee->half_days;
                            $late_comings_Sales += $employee->late_comings;
                            @endphp
                            @endif
                            @endforeach
                            <tr>
                                <td></td>
                                <td class="px-4 py-3"><strong>Total</strong></td>
                                <td class="px-4 py-3"><strong>{{ $planned_leaves_Sales}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $unplanned_leaves_Sales}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $sick_leaves_Sales}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $half_days_Sales}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $late_comings_Sales}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $sales_total_worked_mins_formatted }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Admin -->
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto">
            <h2 class="mb-4 text-xl font-semibold leading-none text-gray-900 dark:text-white">Admin Summary</h2>
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto pb-[160px]">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Employee ID</th>
                                <th scope="col" class="px-4 py-3">Stage Name</th>
                                <th scope="col" class="px-4 py-3">Planned Leave</th>
                                <th scope="col" class="px-4 py-3">Unplanned Leave</th>
                                <th scope="col" class="px-4 py-3">Sick Leave</th>
                                <th scope="col" class="px-4 py-3">Half Days</th>
                                <th scope="col" class="px-4 py-3">Late Comings</th>
                                <th scope="col" class="px-4 py-3">No. Of Hours Worked</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $planned_leaves_Admin = 0;
                            $unplanned_leaves_Admin = 0;
                            $sick_leaves_Admin = 0;
                            $half_days_Admin = 0;
                            $late_comings_Admin = 0;
                            @endphp
                            @foreach ($employees as $employee)
                            @if ($employee->department == 'Admin')
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $employee->Employee_ID}}</th>
                                <td class="px-4 py-3">{{ $employee->Stage_name}}</td>
                                <td class="px-4 py-3">{{ $employee->planned_leaves}}</td>
                                <td class="px-4 py-3">{{ $employee->unplanned_leaves}}</td>
                                <td class="px-4 py-3">{{ $employee->sick_leaves}}</td>
                                <td class="px-4 py-3">{{ $employee->half_days}}</td>
                                <td class="px-4 py-3">{{ $employee->late_comings}}</td>
                                <td class="px-4 py-3">{{ $employee->total_hours_worked_formatted }}</td>
                            </tr>
                            @php
                            $planned_leaves_Admin += $employee->planned_leaves;
                            $unplanned_leaves_Admin += $employee->unplanned_leaves;
                            $sick_leaves_Admin += $employee->sick_leaves;
                            $half_days_Admin += $employee->half_days;
                            $late_comings_Admin += $employee->late_comings;
                            @endphp
                            @endif
                            @endforeach
                            <tr>
                                <td></td>
                                <td class="px-4 py-3"><strong>Total</strong></td>
                                <td class="px-4 py-3"><strong>{{ $planned_leaves_Admin}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $unplanned_leaves_Admin}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $sick_leaves_Admin}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $half_days_Admin}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $late_comings_Admin}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $admin_total_worked_mins_formatted }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Marketing -->
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto">
            <h2 class="mb-4 text-xl font-semibold leading-none text-gray-900 dark:text-white">Web & Marketing Summary</h2>
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto pb-[160px]">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Employee ID</th>
                                <th scope="col" class="px-4 py-3">Stage Name</th>
                                <th scope="col" class="px-4 py-3">Planned Leave</th>
                                <th scope="col" class="px-4 py-3">Unplanned Leave</th>
                                <th scope="col" class="px-4 py-3">Sick Leave</th>
                                <th scope="col" class="px-4 py-3">Half Days</th>
                                <th scope="col" class="px-4 py-3">Late Comings</th>
                                <th scope="col" class="px-4 py-3">No. Of Hours Worked</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $planned_leaves_Marketing = 0;
                            $unplanned_leaves_Marketing = 0;
                            $sick_leaves_Marketing = 0;
                            $half_days_Marketing = 0;
                            $late_comings_Marketing = 0;
                            @endphp
                            @foreach ($employees as $employee)
                            @if ($employee->department == 'Web & Marketing')
                            @php
                            $planned_leaves_Marketing += $employee->planned_leaves;
                            $unplanned_leaves_Marketing += $employee->unplanned_leaves;
                            $sick_leaves_Marketing += $employee->sick_leaves;
                            $half_days_Marketing += $employee->half_days;
                            $late_comings_Marketing += $employee->late_comings;
                            @endphp
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $employee->Employee_ID}}</th>
                                <td class="px-4 py-3">{{ $employee->Stage_name}}</td>
                                <td class="px-4 py-3">{{ $employee->planned_leaves}}</td>
                                <td class="px-4 py-3">{{ $employee->unplanned_leaves}}</td>
                                <td class="px-4 py-3">{{ $employee->sick_leaves}}</td>
                                <td class="px-4 py-3">{{ $employee->half_days}}</td>
                                <td class="px-4 py-3">{{ $employee->late_comings}}</td>
                                <td class="px-4 py-3">{{  $employee->total_hours_worked_formatted}}</td>
                            </tr>

                            @endif
                            @endforeach
                            <tr>
                                <td></td>
                                <td class="px-4 py-3"><strong>Total</strong></td>
                                <td class="px-4 py-3"><strong>{{ $planned_leaves_Marketing}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $unplanned_leaves_Marketing}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $sick_leaves_Marketing}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $half_days_Marketing}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $late_comings_Marketing}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $web_and_marketing_total_worked_mins_formatted }}</strong></td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- IT -->
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto">
            <h2 class="mb-4 text-xl font-semibold leading-none text-gray-900 dark:text-white">IT Summary</h2>
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto pb-[160px]">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Employee ID</th>
                                <th scope="col" class="px-4 py-3">Stage Name</th>
                                <th scope="col" class="px-4 py-3">Planned Leave</th>
                                <th scope="col" class="px-4 py-3">Unplanned Leave</th>
                                <th scope="col" class="px-4 py-3">Sick Leave</th>
                                <th scope="col" class="px-4 py-3">Half Days</th>
                                <th scope="col" class="px-4 py-3">Late Comings</th>
                                <th scope="col" class="px-4 py-3">No. Of Hours Worked</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $planned_leaves_IT = 0;
                            $unplanned_leaves_IT = 0;
                            $sick_leaves_IT = 0;
                            $half_days_IT = 0;
                            $late_comings_IT = 0;
                            @endphp
                            @foreach ($employees as $employee)
                            @if ($employee->department == 'IT')
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $employee->Employee_ID}}</th>
                                <td class="px-4 py-3">{{ $employee->Stage_name}}</td>
                                <td class="px-4 py-3">{{ $employee->planned_leaves}}</td>
                                <td class="px-4 py-3">{{ $employee->unplanned_leaves}}</td>
                                <td class="px-4 py-3">{{ $employee->sick_leaves}}</td>
                                <td class="px-4 py-3">{{ $employee->half_days}}</td>
                                <td class="px-4 py-3">{{ $employee->late_comings}}</td>
                                <td class="px-4 py-3">{{ $employee->total_hours_worked_formatted}}</td>
                            </tr>
                            @php
                            $planned_leaves_IT += $employee->planned_leaves;
                            $unplanned_leaves_IT += $employee->unplanned_leaves;
                            $sick_leaves_IT += $employee->sick_leaves;
                            $half_days_IT += $employee->half_days;
                            $late_comings_IT += $employee->late_comings;
                            @endphp
                            @endif
                            @endforeach
                            <tr>
                                <td></td>
                                <td class="px-4 py-3"><strong>Total</strong></td>
                                <td class="px-4 py-3"><strong>{{ $planned_leaves_IT}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $unplanned_leaves_IT}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $sick_leaves_IT}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $half_days_IT}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $late_comings_IT}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $it_total_worked_mins_formatted }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Management -->
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto">
            <h2 class="mb-4 text-xl font-semibold leading-none text-gray-900 dark:text-white">Management Summary</h2>
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto pb-[160px]">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Employee ID</th>
                                <th scope="col" class="px-4 py-3">Stage Name</th>
                                <th scope="col" class="px-4 py-3">Planned Leave</th>
                                <th scope="col" class="px-4 py-3">Unplanned Leave</th>
                                <th scope="col" class="px-4 py-3">Sick Leave</th>
                                <th scope="col" class="px-4 py-3">Half Days</th>
                                <th scope="col" class="px-4 py-3">Late Comings</th>
                                <th scope="col" class="px-4 py-3">No. Of Hours Worked</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $planned_leaves_Management = 0;
                            $unplanned_leaves_Management = 0;
                            $sick_leaves_Management = 0;
                            $half_days_Management = 0;
                            $late_comings_Management = 0;
                            @endphp
                            @foreach ($employees as $employee)
                            @if ($employee->department == 'Management')
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $employee->Employee_ID}}</th>
                                <td class="px-4 py-3">{{ $employee->Stage_name}}</td>
                                <td class="px-4 py-3">{{ $employee->planned_leaves}}</td>
                                <td class="px-4 py-3">{{ $employee->unplanned_leaves}}</td>
                                <td class="px-4 py-3">{{ $employee->sick_leaves}}</td>
                                <td class="px-4 py-3">{{ $employee->half_days}}</td>
                                <td class="px-4 py-3">{{ $employee->late_comings}}</td>
                                <td class="px-4 py-3">{{ $employee->total_hours_worked_formatted }}</td>
                            </tr>
                            @php
                            $planned_leaves_Management += $employee->planned_leaves;
                            $unplanned_leaves_Management += $employee->unplanned_leaves;
                            $sick_leaves_Management += $employee->sick_leaves;
                            $half_days_Management += $employee->half_days;
                            $late_comings_Management += $employee->late_comings;
                            @endphp
                            @endif
                            @endforeach
                            <tr>
                                <td></td>
                                <td class="px-4 py-3"><strong>Total</strong></td>
                                <td class="px-4 py-3"><strong>{{ $planned_leaves_Management}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $unplanned_leaves_Management}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $sick_leaves_Management}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $half_days_Management}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $late_comings_Management}}</strong></td>
                                <td class="px-4 py-3"><strong>{{$management_total_worked_mins_formatted }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- PH -->
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto">
            <h2 class="mb-4 text-xl font-semibold leading-none text-gray-900 dark:text-white">Philippine Summary</h2>
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto pb-[160px]">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Employee ID</th>
                                <th scope="col" class="px-4 py-3">Stage Name</th>
                                <th scope="col" class="px-4 py-3">Planned Leave</th>
                                <th scope="col" class="px-4 py-3">Unplanned Leave</th>
                                <th scope="col" class="px-4 py-3">Sick Leave</th>
                                <th scope="col" class="px-4 py-3">Half Days</th>
                                <th scope="col" class="px-4 py-3">Late Comings</th>
                                <th scope="col" class="px-4 py-3">No. Of Hours Worked</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $planned_leaves_Management = 0;
                            $unplanned_leaves_Management = 0;
                            $sick_leaves_Management = 0;
                            $half_days_Management = 0;
                            $late_comings_Management = 0;
                            @endphp
                            @foreach ($employees as $employee)
                            @if ($employee->department == 'PH-Team')
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $employee->Employee_ID}}</th>
                                <td class="px-4 py-3">{{ $employee->Stage_name}}</td>
                                <td class="px-4 py-3">{{ $employee->planned_leaves}}</td>
                                <td class="px-4 py-3">{{ $employee->unplanned_leaves}}</td>
                                <td class="px-4 py-3">{{ $employee->sick_leaves}}</td>
                                <td class="px-4 py-3">{{ $employee->half_days}}</td>
                                <td class="px-4 py-3">{{ $employee->late_comings}}</td>
                                <td class="px-4 py-3">{{ $employee->total_hours_worked_formatted }}</td>
                            </tr>
                            @php
                            $planned_leaves_Management += $employee->planned_leaves;
                            $unplanned_leaves_Management += $employee->unplanned_leaves;
                            $sick_leaves_Management += $employee->sick_leaves;
                            $half_days_Management += $employee->half_days;
                            $late_comings_Management += $employee->late_comings;
                            @endphp
                            @endif
                            @endforeach
                            <tr>
                                <td></td>
                                <td class="px-4 py-3"><strong>Total</strong></td>
                                <td class="px-4 py-3"><strong>{{ $planned_leaves_Management}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $unplanned_leaves_Management}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $sick_leaves_Management}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $half_days_Management}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $late_comings_Management}}</strong></td>
                                <td class="px-4 py-3"><strong>{{ $ph_team_total_worked_mins_formatted}}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>