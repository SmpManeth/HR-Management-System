<x-app-layout>


    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto">
            <h2 class="mb-4 text-xl font-semibold leading-none text-gray-900 dark:text-white">Summary</h2>
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">


                <div class="overflow-x-auto pb-[160px]">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Date</th>
                                <th scope="col" class="px-4 py-3">Employee ID</th>
                                <th scope="col" class="px-4 py-3">Employee Name</th>
                                <th scope="col" class="px-4 py-3">Check In</th>
                                <th scope="col" class="px-4 py-3">Check Out</th>
                                <th scope="col" class="px-4 py-3">Shift</th>
                                <th scope="col" class="px-4 py-3">No WO Hours</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)

                            @foreach ($employee->attendances->sortBy('date') as $employee_attendances )
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $employee_attendances->date}}</th>
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $employee->Employee_ID}}</th>
                                <td class="px-4 py-3">{{ $employee->First_Name}} {{ $employee->Last_Name}}</td>
                                <td class="px-4 py-3">{{ $employee_attendances->check_in}}</td>
                                <td class="px-4 py-3">{{ $employee_attendances->check_out}}</td>
                                <td class="px-4 py-3">{{ $employee_attendances->shift}}</td>
                                <td class="px-4 py-3">
                                    <?php
                                        $checkIn = new DateTime($employee_attendances->check_in);
                                        $checkOut = new DateTime($employee_attendances->check_out);
                                        $hoursWorked = $checkIn->diff($checkOut)->format('%h:%i');
                                        echo $hoursWorked;
                                    ?>
                                </td>
                                <td class="px-4 py-3">{{ $employee_attendances->status}}</td>
                            </tr>
                            @endforeach

                            @endforeach


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>

</x-app-layout>