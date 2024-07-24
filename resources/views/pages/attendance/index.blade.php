<x-app-layout>


    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto">
            <h2 class="mb-4 text-xl font-semibold leading-none text-gray-900 dark:text-white">Summary</h2>

            <form action="{{ route('attendances.index') }}" method="GET" enctype="multipart/form-data">
                <div class="filters py-4">
                    <div>
                        <label for="user" class="text-sm text-gray-700 pr-4">Filter By Employee : </label>
                        <select name="user" id="user" class="border border-gray-300 rounded-md text-sm text-gray-500 p-2" onchange="this.form.submit()">
                            <option value="">Select Employee</option>
                            @foreach ($allEmployees as $employee)
                            <option value="{{ $employee->Employee_ID }}">{{ $employee->Stage_name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </form>

            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">


                <div class="overflow-x-auto pb-[160px]">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Date</th>
                                <th scope="col" class="px-4 py-3">Employee ID</th>
                                <th scope="col" class="px-4 py-3">Stage Name </th>
                                <th scope="col" class="px-4 py-3">Check In</th>
                                <th scope="col" class="px-4 py-3">Check Out</th>
                                <th scope="col" class="px-4 py-3">Shift</th>
                                <th scope="col" class="px-4 py-3">No WO Hours</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $employee_attendances)

                          
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $employee_attendances->date}}</th>
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $employee_attendances->employee->Employee_ID}}</th>
                                <td class="px-4 py-3">{{ $employee_attendances->employee->Stage_name}}</td>
                                <td class="px-4 py-3">{{ $employee_attendances->check_in}}</td>
                                <td class="px-4 py-3">{{ $employee_attendances->check_out}}</td>
                                <td class="px-4 py-3">{{ $employee_attendances->shift}}</td>
                                
                                <td class="px-4 py-3">
                                    <?php
                                    $checkIn = new DateTime($employee_attendances->check_in);
                                    $checkOut = new DateTime($employee_attendances->check_out);
                                    if ($checkOut < $checkIn) {
                                        $checkOut->modify('+1 day');
                                    }
                                    $hoursWorked = $checkIn->diff($checkOut)->format('%h:%i');
                                    echo $hoursWorked;

                                    ?>
                                </td>

                                <td class="px-4 py-3">{{ $employee_attendances->status}}</td>
                                <td class="px-4 py-3 flex items-center justify-center">
                                    <button id="{{ $employee_attendances->id}}-dropdown-button" data-dropdown-toggle="{{ $employee_attendances->id}}-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    <div id="{{ $employee_attendances->id}}-dropdown" class="hidden z-40 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="{{ $employee_attendances->id}}-dropdown-button">
                                            <li>
                                                <a href="{{ route('attendances.edit' , $employee_attendances->id ) }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <form action="{{ route('attendances.destroy' , $employee_attendances->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                           

                            @endforeach


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>

</x-app-layout>