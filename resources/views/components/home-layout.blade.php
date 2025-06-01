<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gym Spot')</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@800&display=swap" rel="stylesheet">
    @vite(['resources/js/script.js'])
</head>

<body class="flex flex-col min-h-screen">
   
    <x-navbar-home></x-navbar-home>
    
    
    <main class="flex-grow z-0 overflow-x-hidden">
        {{$slot}}
    </main>

    
    <x-footer></x-footer>

    
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    @stack('scripts')
</body>
</html>
