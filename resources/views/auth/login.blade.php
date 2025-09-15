<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-white px-4 sm:px-6 lg:px-8">
        <!-- Logo at the top -->
        <div class="flex justify-center mb-8">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-24 w-auto">
        </div>

        <div class="w-full max-w-md space-y-8">
            <!-- Heading -->
            <div class="text-center">
                <h2 class="mt-6 text-3xl font-extrabold text-blue-700">
                    Sign in to your account
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Enter your email and password to access your dashboard
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-center text-red-500" :status="session('status')" />

            <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" name="email" type="email" autocomplete="email" required
                               class="appearance-none rounded-t-md relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                               placeholder="Email address" value="{{ old('email') }}">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                               class="appearance-none rounded-b-md relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                               placeholder="Password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center text-sm text-gray-700">
                        <input id="remember_me" name="remember" type="checkbox"
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <span class="ml-2">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800">
                            Forgot your password?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Sign In
                    </button>
                </div>

                <!-- Register Link -->
                <p class="mt-2 text-center text-sm text-gray-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-blue-700 hover:text-blue-900 font-medium">Register</a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>
