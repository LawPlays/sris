<div class="flex h-screen bg-gray-50">
    <!-- Sidebar -->
    <nav class="bg-white w-64 flex flex-col justify-between border-r border-gray-200 shadow-lg">
        <!-- Top: Logo + Navigation -->
        <div>
            <!-- Logo -->
            <div class="flex items-center justify-center h-24 border-b border-gray-200">
                <a href="{{ route('student.dashboard') }}">
                    <x-application-logo class="h-14 w-auto text-gray-800" />
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="mt-8 flex flex-col space-y-2 px-4">
                <x-nav-link class="flex items-center px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-700 transition"
                    :href="route('student.dashboard')" :active="request()->routeIs('student.dashboard')">
                    <span class="material-icons mr-3">dashboard</span>
                    {{ __('Dashboard') }}
                </x-nav-link>

                <x-nav-link class="flex items-center px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-700 transition"
                    :href="route('student.enrollment.create')" :active="request()->routeIs('student.enrollment.*')">
                    <span class="material-icons mr-3">assignment</span>
                    {{ __('Enrollment Form') }}
                </x-nav-link>
            </div>
        </div>

        <!-- Bottom: Logout -->
        <div class="mb-6 px-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-nav-link class="flex items-center px-4 py-2 rounded text-red-600 hover:bg-red-100 hover:text-red-800 transition"
                    :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    <span class="material-icons mr-3">logout</span>
                    {{ __('Log Out') }}
                </x-nav-link>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex-1 p-8 overflow-auto">
        @yield('content')
    </div>
</div>
