<x-app-layout>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <form action="{{ route('employees.update' ,$employee->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <h2 class="mb-4 text-xl font-semibold leading-none text-gray-900 dark:text-white">General Information</h2>
                <div class="grid gap-4 mb-4 md:gap-6 md:grid-cols-2 sm:mb-8">

                    <div>
                        <label for="Employee_ID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee ID</label>
                        <input value="{{ old('Employee_ID', $employee->Employee_ID) }}" type="text" name="Employee_ID" id="Employee_ID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="First Name" required="">
                    </div>
                    <div>
                        <label for="First_Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                        <input value="{{ old('First_Name' , $employee->First_Name ) }}" type="text" name="First_Name" id="First_Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="First Name" required="">
                    </div>
                    <div>
                        <label for="Last_Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                        <input value="{{ old('Last_Name' , $employee->Last_Name ) }}" type="text" name="Last_Name" id="Last_Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Last Name" required="">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input value="{{ old('email' , $employee->email ) }}" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="name@company.com" required="">
                    </div>

                    <div>
                        <label for="department" class="inline-flex items-center mb-2 text-sm font-medium text-gray-900 dark:text-white"> Department </label>
                        <select id="department" name="department" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option disabled selected>Select Department</option>
                            <option value="Admin" {{ $employee->department == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Management" {{ $employee->department == 'Management' ? 'selected' : '' }}>Management</option>
                            <option value="Marketing" {{ $employee->department == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                            <option value="IT" {{ $employee->department == 'IT' ? 'selected' : '' }}>IT</option>
                            <option value="Sales" {{ $employee->department == 'Sales' ? 'selected' : '' }}>Sales</option>
                            <option value="HR" {{ $employee->department == 'HR' ? 'selected' : '' }}>HR</option>
                        </select>
                    </div>

                    <div>
                        <label for="weekday_shift" class="inline-flex items-center mb-2 text-sm font-medium text-gray-900 dark:text-white"> Week Day Shift </label>
                        <select id="weekday_shift" name="weekday_shift" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option disabled selected>Select Shift</option>
                            <option value="09:00 - 17:00" {{ $employee->weekday_shift == '09:00 - 17:00' ? 'selected' : '' }}>09:00 - 17:00</option>
                            <option value="10:00 - 18:00" {{ $employee->weekday_shift == '10:00 - 18:00' ? 'selected' : '' }}>10:00 - 18:00</option>
                            <option value="11:30 - 18.30" {{ $employee->weekday_shift == '11:30 - 18.30' ? 'selected' : '' }}>11:30 - 18.30</option>
                            <option value="12:00 - 21:00" {{ $employee->weekday_shift == '12:00 - 21:00' ? 'selected' : '' }}>12:00 - 21:00</option>
                            <option value="13:00 - 22:00" {{ $employee->weekday_shift == '13:00 - 22:00' ? 'selected' : '' }}>13:00 - 22:00</option>
                            <option value="14:00 - 23:00" {{ $employee->weekday_shift == '14:00 - 23:00' ? 'selected' : '' }}>14:00 - 23:00</option>
                            <option value="15:30 - 00:30" {{ $employee->weekday_shift == '15:30 - 00:30' ? 'selected' : '' }}>15:30 - 00:30</option>
                            <option value="17:00 - 02:00" {{ $employee->weekday_shift == '17:00 - 02:00' ? 'selected' : '' }}>17:00 - 02:00</option>
                        </select>
                    </div>

                    <div>
                        <label for="weekend_shift" class="inline-flex items-center mb-2 text-sm font-medium text-gray-900 dark:text-white"> Weekend Shift </label>
                        <select id="weekend_shift" name="weekend_shift" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option disabled selected>Select Shift</option>
                            <option value="13:00 - 22:00" {{ $employee->weekend_shift == '13:00 - 22:00' ? 'selected' : '' }}>13:00 - 22:00</option>
                            <option value="14:00 - 23:00" {{ $employee->weekend_shift == '14:00 - 23:00' ? 'selected' : '' }}>14:00 - 23:00</option>
                            <option value="15:30 - 00:30" {{ $employee->weekend_shift == '15:30 - 00:30' ? 'selected' : '' }}>15:30 - 00:30</option>
                        </select>
                    </div>
                    <div>
                        <label for="total_leaves_per_month" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total leaves per Month</label>
                        <input type="text" value="{{ old('total_leaves_per_month' , $employee->total_leaves_per_month ) }}" name="total_leaves_per_month" id="total_leaves_per_month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="e.g React Native Developer" required="">
                    </div>
                    <div>
                        <label for="status" class="inline-flex items-center mb-2 text-sm font-medium text-gray-900 dark:text-white"> Status </label>
                        <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option disabled selected>Select Status</option>
                            <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Update user
                </button>
            </form>
        </div>
    </section>


</x-app-layout>