<x-app-layout>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl">
            <form action="{{ route('attendances.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <h2 class="mb-4 text-xl font-semibold leading-none text-gray-600">General Information</h2>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-small text-gray-600">Employee ID - {{ $employee->Employee_ID }}</label>
                        <label class="block mb-2 text-sm font-small text-gray-600">First Name - {{ $employee->First_Name . ' ' . $employee->Last_Name }}</label>
                        <label class="block mb-2 text-sm font-small text-gray-600">Email - {{ $employee->email }}</label>
                        <label class="inline-flex items-center mb-2 text-sm font-small text-gray-600">Department - {{ $employee->department }}</label>
                    </div>
                    <div>
                        <label class="block items-center mb-2 text-sm font-small text-gray-600">Week Day Shift - {{ $employee->weekday_shift }}</label>
                        <label class="block items-center mb-2 text-sm font-small text-gray-600">Weekend Shift - {{ $employee->weekend_shift }}</label>
                        <label class="block mb-2 text-sm font-small text-gray-600">Total Leaves per Month - {{ $employee->total_leaves_per_month }}</label>
                        <label class="block items-center mb-2 text-sm font-small text-gray-600">Status - {{ $employee->status }}</label>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-8">
                    <div>
                        <label for="date" class="block mb-2 text-sm font-small text-gray-900">Date</label>
                        <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                        <input type="date" name="date" id="date" class="block w-full px-4 py-2 text-sm text-gray-900 bg-gray-200 border border-gray-200 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 focus:outline-none dark:bg-gray-800 dark:text-gray-300 dark:border-gray-900" value="{{ old('date') }}">
                        @error('date')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                        <br>
                        <label for="check_out" class="block mb-2 text-sm font-small text-gray-900">Time Out</label>
                        <input type="time" name="check_out" id="check_out" class="block w-full px-4 py-2 text-sm text-gray-900 bg-gray-200 border border-gray-200 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 focus:outline-none dark:bg-gray-800 dark:text-gray-300 dark:border-gray-900" value="{{ old('check_out') }}">
                        @error('check_out')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="check_in" class="block mb-2 text-sm font-small text-gray-900">Time In</label>
                        <input type="time" name="check_in" id="check_in" class="block w-full px-4 py-2 text-sm text-gray-900 bg-gray-200 border border-gray-200 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 focus:outline-none dark:bg-gray-800 dark:text-gray-300 dark:border-gray-900" value="{{ old('check_in') }}">
                        @error('check_in')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                        <br>
                        <label for="status" class="block mb-2 text-sm font-small text-gray-900">Status</label>
                        <select name="status" id="status" class="block w-full px-4 py-2 text-sm text-gray-900 bg-gray-200 border border-gray-200 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 focus:outline-none dark:bg-gray-800 dark:text-gray-300 dark:border-gray-900">
                            <option value="Half Day" {{ old('status') == 'Half Day' ? 'selected' : '' }}>Half Day</option>
                            <option value="Planned Leave" {{ old('status') == 'Planned Leave' ? 'selected' : '' }}>Planned Leave</option>
                            <option value="Unplanned Leave" {{ old('status') == 'Unplanned Leave' ? 'selected' : '' }}>Unplanned Leave</option>
                            <option value="Sick Leave" {{ old('status') == 'Sick Leave' ? 'selected' : '' }}>Sick Leave</option>
                            <option value="OFF" {{ old('status') == 'OFF' ? 'selected' : '' }}>OFF Day</option>
                        </select>
                        @error('status')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="block items-center px-5 py-2.5 text-sm font-small text-center text-white bg-primary-900 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Mark Attendance
                    </button>
                </div>

            </form>
        </div>
    </section>

</x-app-layout>
