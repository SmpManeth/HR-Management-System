<x-app-layout>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <form action="#">
                <h2 class="mb-4 text-xl font-semibold leading-none text-gray-900 dark:text-white">General Information</h2>
                <div class="grid gap-4 mb-4 md:gap-6 md:grid-cols-2 sm:mb-8">

                    <div>
                        <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee ID</label>
                        <input type="text" name="first-name" id="first-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="First Name" required="">
                    </div>
                    <div>
                        <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                        <input type="text" name="first-name" id="first-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="First Name" required="">
                    </div>
                    <div>
                        <label for="last-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                        <input type="text" name="last-name" id="last-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Last Name" required="">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="name@company.com" required="">
                    </div>

                    <div>
                        <label for="user-role" class="inline-flex items-center mb-2 text-sm font-medium text-gray-900 dark:text-white"> Department </label>
                        <select id="user-role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option disabled selected>Select Department</option>
                            <option value="admin">Admin</option>
                            <option value="management">Management</option>
                            <option value="marketing">Marketing</option>
                            <option value="it">IT</option>
                            <option value="sales">Sales</option>
                            <option value="hr">HR</option>
                        </select>
                    </div>

                    <div>
                        <label for="user-role" class="inline-flex items-center mb-2 text-sm font-medium text-gray-900 dark:text-white"> Week Day Shift </label>
                        <select id="user-role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option disabled selected>Select Shift</option>
                            <option value="09:00 - 17:00">09:00 - 17:00</option>
                            <option value="10:00 - 18:00">10:00 - 18:00</option>
                            <option value="11:30 - 18.30">11:30 - 18.30</option>
                            <option value="12:00 - 21:00">12:00 - 21:00</option>
                            <option value="13:00 - 22:00">13:00 - 22:00</option>
                            <option value="14:00 - 23:00">14:00 - 23:00</option>
                            <option value="15:30 - 00:30">15:30 - 00:30</option>
                            <option value="17:00 - 02:00">17:00 - 02:00</option>
                        </select>
                    </div>

                    <div>
                        <label for="user-role" class="inline-flex items-center mb-2 text-sm font-medium text-gray-900 dark:text-white"> Weekend Shift </label>
                        <select id="user-role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option disabled selected>Select Shift</option>
                            <option value="13:00 - 22:00">13:00 - 22:00</option>
                            <option value="14:00 - 23:00">14:00 - 23:00</option>
                            <option value="15:30 - 00:30">15:30 - 00:30</option>
                        </select>
                    </div>
                    <div>
                        <label for="job-title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total leaves per Month</label>
                        <input type="text" name="job-title" id="job-title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="e.g React Native Developer" required="">
                    </div>
                    <div>
                        <label for="user-role" class="inline-flex items-center mb-2 text-sm font-medium text-gray-900 dark:text-white"> Status </label>
                        <select id="user-role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option disabled selected>Select Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                </div>

                <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Add user
                </button>
            </form>
        </div>
    </section>


</x-app-layout>