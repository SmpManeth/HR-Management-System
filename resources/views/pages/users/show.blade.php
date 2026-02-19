<x-app-layout>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto">
            <div class="mb-4 flex items-center gap-2">
                <a href="{{ route('users.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">← Back to Users</a>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-6">
                <h2 class="mb-4 text-xl font-semibold leading-none text-gray-900 dark:text-white">User Details</h2>
                <dl class="grid gap-4 md:grid-cols-2">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">ID</dt>
                        <dd class="mt-1 text-gray-900 dark:text-white">{{ $user->id }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</dt>
                        <dd class="mt-1 text-gray-900 dark:text-white">{{ $user->name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</dt>
                        <dd class="mt-1 text-gray-900 dark:text-white">{{ $user->email }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Created</dt>
                        <dd class="mt-1 text-gray-900 dark:text-white">{{ $user->created_at->format('M d, Y H:i') }}</dd>
                    </div>
                </dl>
                <div class="mt-6 flex gap-2">
                    <a href="{{ route('users.edit', $user) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-primary-700 rounded-lg hover:bg-primary-800">Edit User</a>
                    <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:text-white dark:border-gray-600">Back to List</a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
