<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400..700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <script>
        if (localStorage.getItem('dark-mode') === 'false' || !('dark-mode' in localStorage)) {
            document.querySelector('html').classList.remove('dark');
            document.querySelector('html').style.colorScheme = 'light';
        } else {
            document.querySelector('html').classList.add('dark');
            document.querySelector('html').style.colorScheme = 'dark';
        }
    </script>
</head>

<body class="font-inter bg-gray-100 text-gray-600 antialiased dark:bg-gray-900 dark:text-gray-400">

    <main class="bg-white dark:bg-gray-900">

        <div class="relative flex">

            <!-- Content -->
            <div class="w-full md:w-1/2">

                <div class="flex h-full min-h-[100dvh] flex-col after:flex-1">

                    <!-- Header -->
                    <div class="flex-1">
                        <div class="flex h-16 items-center justify-between px-4 sm:px-6 lg:px-8">
                            <!-- Logo -->
                            <a class="block" href="/">
                                <img class="mr-3 h-10 w-auto" src="{{ asset('images/logo.svg') }}" alt="Logo">
                            </a>
                        </div>
                    </div>

                    <div class="mx-auto w-full max-w-sm px-4 py-8">
                        {{ $slot }}
                    </div>

                </div>

            </div>

            <!-- Image -->
            <div class="absolute bottom-0 right-0 top-0 hidden md:block md:w-1/2" aria-hidden="true">
                <img class="h-full w-full object-cover object-center" src="{{ asset('images/tentang-kami-3.png') }}"
                    width="760" height="1024" alt="Authentication image" />
            </div>

        </div>

    </main>

    @livewireScriptConfig
</body>

</html>
