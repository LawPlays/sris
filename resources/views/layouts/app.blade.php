<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Student Dashboard') }}</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans h-screen">

<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="bg-white w-64 flex flex-col border-r border-gray-200 shadow-lg">
        <!-- Logo -->
        <div class="flex items-center justify-center h-24 border-b border-gray-200">
            <a href="{{ route('student.dashboard') }}">
                <x-application-logo class="h-14 w-auto text-gray-800" />
            </a>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 mt-4 px-4 space-y-2">
            <a href="{{ route('student.dashboard') }}" 
               class="flex items-center px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-700 transition {{ request()->routeIs('student.dashboard') ? 'bg-blue-100 text-blue-700 font-semibold' : '' }}">
               <span class="material-icons mr-3">dashboard</span>
               Dashboard
            </a>

            <a href="{{ route('student.enrollment.create') }}" 
               class="flex items-center px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-700 transition {{ request()->routeIs('student.enrollment.*') ? 'bg-blue-100 text-blue-700 font-semibold' : '' }}">
               <span class="material-icons mr-3">assignment</span>
               Enrollment Form
            </a>

            @if(auth()->check() && auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center px-4 py-2 rounded text-red-600 hover:bg-red-50 hover:text-red-800 transition">
                   <span class="material-icons mr-3">admin_panel_settings</span>
                   Admin Dashboard
                </a>
            @endif
        </nav>

        <!-- Logout -->
        <div class="px-4 py-4 border-t border-gray-200">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center w-full px-4 py-2 rounded text-red-600 hover:bg-red-50 hover:text-red-800 transition">
                    <span class="material-icons mr-3">logout</span>
                    Log Out
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Top Bar -->
        <header class="bg-white border-b border-gray-200 h-16 flex items-center justify-between px-6 shadow-sm">
            <div class="text-lg font-semibold text-gray-800">
                @yield('page-title', 'Dashboard')
            </div>

            <!-- Profile Info -->
            <div class="flex items-center space-x-4">
                <div class="text-right">
                    <div class="font-medium text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <span class="material-icons text-gray-400">account_circle</span>
            </div>
        </header>

        <!-- Content Area -->
        <main class="flex-1 p-8 overflow-auto bg-gray-50">
            @yield('content')
        </main>
    </div>
</div>

</body>
</html>
