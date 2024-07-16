<x-app-layout>


    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto">
            <h2 class="mb-4 text-xl font-semibold leading-none text-gray-900 dark:text-white">All Employees</h2>
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">


                <div class="overflow-x-auto pb-[160px]">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                            <tr>
                                <th scope="col" class="px-4 py-3">ID</th>
                                <th scope="col" class="px-4 py-3">Full Name</th>
                                <th scope="col" class="px-4 py-3">Stage Name</th>
                                <th scope="col" class="px-4 py-3">Location</th>
                                <th scope="col" class="px-4 py-3">Email</th>
                                <th scope="col" class="px-4 py-3">Department</th>
                                <th scope="col" class="px-4 py-3">Designation</th>
                                <th scope="col" class="px-4 py-3">Weekday Shift</th>
                                <th scope="col" class="px-4 py-3">Weekend Shift</th>
                                <th scope="col" class="px-4 py-3">leaves per Month</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $employee->Employee_ID}}</th>
                                <td class="px-4 py-3">{{ $employee->First_Name}} {{ $employee->Last_Name}}</td>
                                <td class="px-4 py-3">{{ $employee->Stage_name}}</td>
                                <td class="px-4 py-3">{{ $employee->work_location}}</td>
                                <td class="px-4 py-3">{{ $employee->email}}</td>
                                <td class="px-4 py-3">{{ $employee->department}}</td>
                                <td class="px-4 py-3">{{ $employee->employee_desgination}}</td>
                                <td class="px-4 py-3">{{ $employee->weekday_shift}}</td>
                                <td class="px-4 py-3">{{ $employee->weekend_shift}}</td>
                                <td class="px-4 py-3">{{ $employee->total_leaves_per_month}}</td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="w-fit @if ($employee->status == "active")bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif text-xs font-medium mr-2 px-2.5 py-0.5 rounded ">
                                        @if ($employee->status == "active")
                                        Active
                                        @else
                                        Inactive
                                        @endif
                                    </div>
                                </td>

                                <td class="px-4 py-3 flex items-center justify-end">
                                    <button id="{{ $employee->Employee_ID}}-dropdown-button" data-dropdown-toggle="{{ $employee->Employee_ID}}-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    <div id="{{ $employee->Employee_ID}}-dropdown" class="hidden z-40 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="{{ $employee->Employee_ID}}-dropdown-button">
                                            <li>
                                                <a href="{{ route('attendances.create', ['employee_id' => $employee->id]) }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mark Attendance</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('employees.edit' ,$employee->id ) }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
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