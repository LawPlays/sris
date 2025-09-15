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
                    Reset Your Password
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Forgot your password? Enter your email below and we’ll send you a link to reset it.
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-center text-red-500" :status="session('status')" />

            <form class="mt-8 space-y-6" method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="sr-only">Email</label>
                    <input id="email" name="email" type="email" autocomplete="email" required autofocus
                           class="appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           placeholder="Email address" value="{{ old('email') }}">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Send Password Reset Link
                    </button>
                </div>

                <!-- Back to login -->
                <p class="mt-4 text-center text-sm text-gray-600">
                    Remembered your password? 
                    <a href="{{ route('login') }}" class="text-blue-700 hover:text-blue-900 font-medium">Login</a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>
