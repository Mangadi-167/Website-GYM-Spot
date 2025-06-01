<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard')</title>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @vite(['resources/js/script.js'])

</head>

<body class="font-sans dark:bg-gray-800">


  <x-navbar></x-navbar>


  <x-sidebar></x-sidebar>


  <div class="flex pt-16">

    <div class="fixed top-0 bottom-0 left-0 w-64">

    </div>


    <main class="flex-1 p-6 ml-64">
      {{$slot}}
    </main>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

</body>

</html>