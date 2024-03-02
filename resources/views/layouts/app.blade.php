<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>IM | @yield('page_title', 'Home')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Go to top arrow -->
        <div id="goTopArrow" class="hidden fixed bottom-4 right-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer h-8 w-8 rotate-180 text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 2a1 1 0 0 1 1 1v11.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-5 5a1 1 0 0 1-1.414 0l-5-5a1 1 0 0 1 1.414-1.414L9 14.586V3a1 1 0 0 1 1-1z" />
            </svg>
        </div>


        <!-- Footer -->
        <footer>
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <p class="text-center text-gray-400 dark:text-gray-500">
                    &copy; 2024 Inventory Management | Alejandro Santos García
                </p>
            </div>
        </footer>
    </div>

    <script>
        // Go to top arrow
        const arrow = document.getElementById('goTopArrow');

        window.addEventListener('scroll', () => {

            if (window.scrollY > 300) {
                arrow.classList.remove('hidden');
            } else {
                arrow.classList.add('hidden');
            }
        });

        // Smooth scroll to top
        goTopArrow.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>

</html>