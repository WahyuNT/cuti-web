<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    @stack('styles') {{-- buat custom CSS per page --}}
</head>

<body>

    <div class="flex h-screen bg-gray-100">
        @include('partials.sidebar')
        <div class="flex flex-col flex-1 overflow-y-auto">
            @include('partials.navbar')
            <div class="px-4 pt-18 pb-10 mt-0">
                @yield('content')
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    @stack('scripts') {{-- buat custom JS per page --}}
</body>

</html>
