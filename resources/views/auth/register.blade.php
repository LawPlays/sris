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
                    Create your account
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Fill in the details below to register as a student
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-center text-red-500" :status="session('status')" />

            <form class="mt-8 space-y-6" method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="sr-only">Name</label>
                    <input id="name" name="name" type="text" required autofocus autocomplete="name"
                           class="appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           placeholder="Full Name" value="{{ old('name') }}">
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="sr-only">Email</label>
                    <input id="email" name="email" type="email" autocomplete="username" required
                           class="appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           placeholder="Email Address" value="{{ old('email') }}">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required
                           class="appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           placeholder="Password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required
                           class="appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           placeholder="Confirm Password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Hidden Role -->
                <input type="hidden" name="role" value="student">

                <!-- Submit Button & Login Link -->
                <div class="flex items-center justify-between">
                    <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:text-blue-800">
                        Already have an account? Login
                    </a>

                    <button type="submit"
                            class="group relative w-auto flex justify-center py-3 px-6 border border-transparent text-sm font-medium rounded-md text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
