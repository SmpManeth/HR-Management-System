<x-app-layout>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto lg:py-16">
            <form action="{{ route('employees.update' ,$employee->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <h2 class="mb-4 text-xl font-semibold leading-none text-gray-900 dark:text-white">General Information</h2>
                <div class="grid gap-4 mb-4 md:gap-6 md:grid-cols-4 sm:mb-8">

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
                        <label for="employee_desgination" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee Desgination</label>
                        <input value="{{ old('employee_desgination' , $employee->employee_desgination ) }}" type="text" name="employee_desgination" id="employee_desgination" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Graphic Designer" required="">
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
                            <option value="PH-Team" {{ $employee->department == 'PH-Team' ? 'selected' : '' }}>PH-Team</option>
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
                            <option value="17:00 - 02:00" {{ $employee->weekend_shift == '17:00 - 02:00' ? 'selected' : '' }}>17:00 - 02:00</option>
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
                    <div>
                        <label for="Stage_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stage Name</label>
                        <input value="{{ old('Stage_name', $employee->Stage_name) }}" type="text" name="Stage_name" id="Stage_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Stage Name" required="">
                    </div>
                    <div>
                        <label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
                        <input value="{{ old('dob', $employee->dob) }}" type="date" name="dob" id="dob" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Date of Birth" required="">
                    </div>
                    <div>
                        <label for="nic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIC</label>
                        <input value="{{ old('nic', $employee->nic) }}" type="text" name="nic" id="nic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NIC" required="">
                    </div>
                    <div>
                        <label for="Address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <input value="{{ old('Address', $employee->Address) }}" type="text" name="Address" id="Address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Address" required="">
                    </div>
                    <div>
                        <label for="Contact_Number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Number</label>
                        <input value="{{ old('Contact_Number', $employee->Contact_Number) }}" type="text" name="Contact_Number" id="Contact_Number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Contact Number" required="">
                    </div>
                    <div>
                        <label for="work_location" class="inline-flex items-center mb-2 text-sm font-medium text-gray-900 dark:text-white"> Work Location </label>
                        <select id="work_location" name="work_location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option disabled selected>Select Location</option>
                            <option value="Home" {{ $employee->work_location == 'Home' ? 'selected' : '' }}>Home</option>
                            <option value="Office"  {{ $employee->work_location == 'Office' ? 'selected' : '' }} >Office</option>
                        </select>
                    </div>
                    <div>
                        <label for="joined_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Joined Date</label>
                        <input value="{{ old('joined_date', $employee->joined_date) }}" type="date" name="joined_date" id="joined_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Joined Date" required="">
                    </div>



                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Update user
                </button>
            </form>
        </div>
    </section>


</x-app-layout>