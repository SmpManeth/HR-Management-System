<x-app-layout>


    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <x-session-message :message="['success' => session('success'), 'error' => session('error')]" />

        <div class="mx-auto">
            <h2 class="mb-4 text-xl font-semibold leading-none text-gray-900 dark:text-white">Summary</h2>

            <div class="flex items-center">
                <form action="{{ route('attendances.index') }}" method="GET" enctype="multipart/form-data">
                    <div class="filters py-4 flex">
                        <div>
                            <label for="user" class="text-sm text-gray-700 pr-4">Filter By Employee : </label>
                            <select name="user" id="user" class="border border-gray-300 rounded-md text-sm text-gray-500 p-2">
                                <option value="">Select Employee</option>
                                <option value="">All</option>
                                @foreach ($allEmployees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->Stage_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="user" class="text-sm text-gray-700 pr-4">Filter By Department : </label>
                            <select name="department" id="department" class="border border-gray-300 rounded-md text-sm text-gray-500 p-2">
                                <option disabled selected>Select Department</option>
                                <option value="Admin">Admin</option>
                                <option value="Management">Management</option>
                                <option value="Web & Marketing">Marketing</option>
                                <option value="IT">IT</option>
                                <option value="Sales">Sales</option>
                                <option value="HR">HR</option>
                                <option value="PH-Team">PH-Team</option>
                            </select>
                        </div>

                        <div class="ml-4 flex items-center">
                            <label for="user" class="text-sm text-gray-700 pr-4">Filter By Date : </label>
                            <div>
                                <input type="date" name="date" id="date" class="px-4  text-sm text-gray-900 bg-gray-200 border border-gray-200 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 focus:outline-none dark:bg-gray-800 dark:text-gray-300 dark:border-gray-900" value="{{ old('date') }}">
                            </div>

                        </div>

                        <div class="ml-4 flex items-center">
                            <label for="user" class="text-sm text-gray-700 pr-4">Filter By Month : </label>

                            <div>
                                <input type="month" name="month" id="month" class="px-4  text-sm text-gray-900 bg-gray-200 border border-gray-200 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 focus:outline-none dark:bg-gray-800 dark:text-gray-300 dark:border-gray-900" value="{{ old('date') }}">
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="ml-4  focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Filter</button>
                        </div>
                    </div>
                </form>


                <form action="{{ route('attendances.generate') }}" class="ml-5 items-center" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="generate-all">
                    <button type="submit" class="flex items-center text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 me-2  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">

                        <svg class="w-7 h-6 text-white pr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z" clip-rule="evenodd" />
                        </svg>
                        Generate Attendances
                    </button>

                </form>
            </div>


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
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $employee_attendances->date }}</th>
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $employee_attendances->employee->Employee_ID }}</th>
                                <td class="px-4 py-3">{{ $employee_attendances->employee->Stage_name }}</td>
                                <td class="px-4 py-3">{{ $employee_attendances->check_in }}</td>
                                <td class="px-4 py-3">{{ $employee_attendances->check_out }}</td>
                                <td class="px-4 py-3">{{ $employee_attendances->shift }}</td>

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

                                <td class="px-4 py-3">{{ $employee_attendances->status }}</td>
                                <td class="px-4 py-3 flex items-center justify-center">
                                    <button id="{{ $employee_attendances->id }}-dropdown-button" data-dropdown-toggle="{{ $employee_attendances->id }}-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    <div id="{{ $employee_attendances->id }}-dropdown" class="hidden z-40 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="{{ $employee_attendances->id }}-dropdown-button">
                                            <li>
                                                <a href="{{ route('attendances.edit', $employee_attendances->id) }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <form action="{{ route('attendances.destroy', $employee_attendances->id) }}" method="POST">
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

                <!-- Add pagination controls here -->
                <div class="mt-4">
                    {{ $attendances->links() }}
                </div>


            </div>
        </div>
    </section>

</x-app-layout>