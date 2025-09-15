<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - SRIS</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100">
    @include('layouts.partials.admin-nav') {{-- hiwalay na nav --}}
    <main class="p-6">
        @yield('content')
    </main>
</body>
</html>
