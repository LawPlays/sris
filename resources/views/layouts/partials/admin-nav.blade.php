<nav class="bg-white border-b border-gray-100 mb-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center">
                    <x-application-logo class="block h-9 w-auto text-gray-800" />
                </a>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.students.index')" :active="request()->routeIs('admin.students.*')">
                        {{ __('Students') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.enrollments.index')" :active="request()->routeIs('admin.enrollments.*')">
                        {{ __('Enrollments') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.reports.dashboard')" :active="request()->routeIs('admin.reports.*')">
                        {{ __('Reports') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
