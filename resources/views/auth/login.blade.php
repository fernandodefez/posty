<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="h-6 mb-5 mt-2">
            <!-- Session Status -->
            <x-auth-session-status :status="session('status')" />
            <!-- Validation Errors -->
            <x-auth-validation-errors :errors="$errors" />
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="relative">
                <x-label for="email" :value="__('Email')" />

                <input id="email" class="mt-1 bg-gray-100 transition-all text-sm font-medium w-full py-2 px-2 border-2 outline-2 outline-blue-600 rounded shadow-sm border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50 @error('email') border-2 bg-red-50 focus:border-red-400 focus:ring focus:ring-red-400 focus:ring-opacity-50 border-red-500 @enderror" type="email" name="email" value="{{ old('email') }}" autofocus placeholder="Enter email"/>
                <div class="text-red-500 text-xs font-normal h-4 mt-1">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <!-- Password -->
            <div class="mt-3">
                <x-label for="password" :value="__('Password')" />

                <input id="password" class="mt-1 bg-gray-100 transition-all text-sm font-medium w-full py-2 px-2 border-2 outline-2 outline-blue-600 rounded shadow-sm border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50 @error('password') border-2 bg-red-50 focus:border-red-400 focus:ring focus:ring-red-400 focus:ring-opacity-50 border-red-500 @enderror"
                         type="password"
                         name="password"
                         placeholder="Enter password"
                         autocomplete="current-password" />
                <div class="text-red-500 text-xs font-normal h-4 mt-1">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between mt-2">
                <!-- Remember Me -->
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="w-12/12 my-5">
                <x-button class="w-full justify-center">
                    {{ __('Log in') }}
                </x-button>
            </div>

            <div class="flex justify-center items-center w-full mb-3">
                <span class="w-4/12 bg-gray-300" style="height: 0.5px"></span>
                <span class="w-4/12 text-center text-gray-400 text-sm">Or continue with</span>
                <span class="w-4/12 bg-gray-300" style="height: 0.5px"></span>
            </div>

            <!-- Third Party Authentication -->
            <div class="grid grid-cols-3 gap-5 my-4">
                <a href="{{ url('auth/google') }}" class="w-full inline-flex items-center font-medium justify-center space-x-24 px-3.5 py-2.5 bg-blue-600 border border-transparent rounded text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-600 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Facebook_f_logo_%282019%29.svg/1365px-Facebook_f_logo_%282019%29.svg.png"
                         class="h-5 w-5 shadow-none" alt="posty-login-with-facebook">
                </a>
                <a href="{{ url('auth/google') }}" class="w-full inline-flex items-center font-medium justify-center space-x-24 px-3.5 py-2.5 bg-white border border-transparent rounded text-xs border-2 border-gray-200 shadow-sm text-gray-900 uppercase tracking-widest hover:bg-gray-100 active:bg-gray-100 focus:outline-none focus:border-gray-200 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    <svg class="fill-current w-4 h-4 mr-2" viewBox="0 0 533.5 544.3" xmlns="http://www.w3.org/2000/svg">
                        <path d="M533.5 278.4c0-18.5-1.5-37.1-4.7-55.3H272.1v104.8h147c-6.1 33.8-25.7 63.7-54.4 82.7v68h87.7c51.5-47.4 81.1-117.4 81.1-200.2z" fill="#4285f4"/>
                        <path d="M272.1 544.3c73.4 0 135.3-24.1 180.4-65.7l-87.7-68c-24.4 16.6-55.9 26-92.6 26-71 0-131.2-47.9-152.8-112.3H28.9v70.1c46.2 91.9 140.3 149.9 243.2 149.9z" fill="#34a853"/>
                        <path d="M119.3 324.3c-11.4-33.8-11.4-70.4 0-104.2V150H28.9c-38.6 76.9-38.6 167.5 0 244.4l90.4-70.1z" fill="#fbbc04"/>
                        <path d="M272.1 107.7c38.8-.6 76.3 14 104.4 40.8l77.7-77.7C405 24.6 339.7-.8 272.1 0 169.2 0 75.1 58 28.9 150l90.4 70.1c21.5-64.5 81.8-112.4 152.8-112.4z" fill="#ea4335"/>
                    </svg>
                </a>
                <a href="{{ url('auth/google') }}" class="w-full inline-flex items-center font-medium justify-center space-x-24 px-3.5 py-2.5 bg-black border border-transparent rounded text-xs text-white uppercase tracking-widest hover:opacity-95 active:bg-blue-600 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Apple_logo_white.svg/1200px-Apple_logo_white.svg.png"
                         class="h-5 w-4 shadow-none" alt="login-with-apple">
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
