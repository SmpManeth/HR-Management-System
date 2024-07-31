<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Flowbite CSS -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        @include('layouts.navigation')

        @include('layouts.sidebar')

        <!-- Page Content -->
        <main>
            <div class="p-4 sm:ml-64">
                <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
                    {{ $slot }}
                </div>
            </div>
        </main>

    </div>
    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

    <script>
        let logoutTimer;
        const logoutAfter = 5 * 60 * 1000; // 5 minutes in milliseconds

        function resetLogoutTimer() {
            clearTimeout(logoutTimer);
            logoutTimer = setTimeout(logoutUser, logoutAfter);
        }

        function logoutUser() {
            $.ajax({
                url: '{{ route('logout') }}',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function() {
                    window.location.href = '{{ route('login') }}';
                },
                error: function() {
                    window.location.href = '{{ route('login') }}';
                }
            });
        }

        $(document).ready(function() {
            $(document).on('mousemove keydown click', resetLogoutTimer);
            resetLogoutTimer();
        });
    </script>
</body>

</html>
