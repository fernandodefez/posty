<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-neutral-600 dark:text-neutral-200" />
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

                <input id="email" class="
                                block w-full font-medium rounded transition-all ease-in-out
                                mt-2 mb-1.5
                                font-medium text-sm w-full rounded transition-all ease-in-out
                                text-neutral-900 dark:text-white
                                bg-gray-100 dark:bg-neutral-700
                                placeholder-gray-400 dark:placeholder-neutral-500
                                outline-2 outline-purple-800 dark:outline-2 dark:outline-500
                                focus-visible:outline-0
                                dark:focus-visible:outline-0
                                @error('email')
                                   dark:text-neutral-900
                                   bg-red-50 dark:bg-red-100 dark:bg-opacity-80
                                   border-2 border-red-500 focus:border-red-500
                                   dark:border-2 dark:focus:border-red-400 dark:border-red-400
                                   focus:ring focus:ring-red-500 focus:ring-opacity-25
                                   dark:focus:ring dark:focus:ring-red-400 dark:focus:ring-opacity-25
                                @else
                                   border-2 border-gray-300 focus:border-purple-800
                                   dark:border-2 dark:border-neutral-600 dark:focus:border-purple-500
                                   focus:ring focus:ring-purple-800 focus:ring-opacity-25
                                   dark:focus:ring dark:focus:ring-purple-500 dark:focus:ring-opacity-25
                                @enderror" type="email" name="email" value="{{ old('email') }}" autofocus placeholder="Enter email"/>
                <div class="text-red-500 dark:text-red-400 text-xs font-medium h-4 mt-1">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <!-- Password -->
            <div class="mt-3">
                <x-label for="password" :value="__('Password')" />

                <input id="password" class="
                                block w-full font-medium rounded transition-all ease-in-out
                                mt-2 mb-1.5
                                font-medium text-sm w-full rounded transition-all ease-in-out
                                text-neutral-900 dark:text-white
                                bg-gray-100 dark:bg-neutral-700
                                placeholder-gray-400 dark:placeholder-neutral-500
                                outline-2 outline-purple-800 dark:outline-2 dark:outline-500
                                focus-visible:outline-0
                                dark:focus-visible:outline-0
                                @error('password')
                                   dark:text-neutral-900
                                   bg-red-50 dark:bg-red-100 dark:bg-opacity-80
                                   border-2 border-red-500 focus:border-red-500
                                   dark:border-2 dark:focus:border-red-400 dark:border-red-400
                                   focus:ring focus:ring-red-500 focus:ring-opacity-25
                                   dark:focus:ring dark:focus:ring-red-400 dark:focus:ring-opacity-25
                                @else
                                   border-2 border-gray-300 focus:border-purple-800
                                   dark:border-2 dark:border-neutral-600 dark:focus:border-purple-500
                                   focus:ring focus:ring-purple-800 focus:ring-opacity-25
                                   dark:focus:ring dark:focus:ring-purple-500 dark:focus:ring-opacity-25
                                @enderror"
                         type="password"
                         name="password"
                         placeholder="Enter password"
                         autocomplete="current-password" />
                <div class="text-red-500 dark:text-red-400  text-xs font-medium h-4 mt-1">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between mt-4">
                <!-- Remember Me -->
                <div class="w-auto">
                    <input id="purple-checkbox" type="checkbox" class="w-4 h-4 rounded-sm cursor-pointer
                    text-purple-700 bg-gray-100 border-2 border-gray-300 outline-2 outline-purple-700 focus:ring focus:ring-purple-800 focus:ring-opacity-25 focus-visible:outline-0 focus-visible:border-0 ring-offset-0
                    dark:text-purple-400 dark:bg-neutral-700 dark:border-2 dark:border-neutral-600 dark:outline-2 dark:outline-purple-400 dark:focus:ring dark:focus:ring-purple-500 dark:focus:ring-opacity-25 dark:focus-visible:outline-0 focus-visible:border-0 ring-offset-0
                    ">
                    <label for="purple-checkbox" class="ml-1.5 text-sm text-neutral-900 dark:text-neutral-300 cursor-pointer">
                        {{ __('Remember me') }}
                    </label>
                </div>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-neutral-600 hover:text-neutral-800 dark:text-neutral-300 dark:hover:text-neutral-400" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="w-12/12 my-5">
                <x-button class="w-full justify-center font-bold">
                    {{ __('Log in') }}
                </x-button>
            </div>

            <div class="flex justify-center items-center w-full mb-3">
                <span class="w-4/12 bg-neutral-300" style="height: 0.5px"></span>
                <span class="w-4/12 text-center text-neutral-700 dark:text-neutral-300 text-sm">Or continue with</span>
                <span class="w-4/12 bg-neutral-300" style="height: 0.5px"></span>
            </div>

            <!-- Third Party Authentication -->
            <div class="grid grid-cols-2 gap-5 my-4">
                <a href="{{ url('oauth/facebook') }}" class="
                    text-xs w-full inline-flex items-center font-medium justify-center space-x-24 px-3.5 py-2.5
                    transition ease-in-out duration-150 rounded disabled:opacity-25
                    bg-blue-500 hover:bg-blue-500
                    dark:bg-neutral-700 dark:hover:bg-neutral-600
                    outline-0 border-0
                    dark:focus:ring dark:focus:ring-neutral-500 dark:focus:ring-opacity-25
                    dark:hover:ring dark:hover:ring-neutral-500 dark:hover:ring-opacity-25
                    focus:ring focus:ring-blue-500 focus:ring-opacity-25
                    hover:ring hover:ring-blue-500 hover:ring-opacity-25
                    ">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Facebook_f_logo_%282019%29.svg/1365px-Facebook_f_logo_%282019%29.svg.png"
                         class="h-5 w-5 shadow-none" alt="posty-login-with-facebook">
                </a>
                <a href="{{ url('oauth/google') }}" class="
                    text-xs w-full inline-flex items-center font-medium justify-center space-x-24 px-3.5 py-2.5
                    transition ease-in-out duration-150 rounded disabled:opacity-25
                    bg-gray-100 hover:bg-gray-200
                    dark:bg-neutral-700 dark:hover:bg-neutral-600
                    outline-0 border-0
                    dark:focus:ring dark:focus:ring-neutral-500 dark:focus:ring-opacity-25
                    dark:hover:ring dark:hover:ring-neutral-500 dark:hover:ring-opacity-25
                    focus:ring focus:ring-gray-300 focus:ring-opacity-75
                    hover:ring hover:ring-gray-300 hover:ring-opacity-75">
                    <svg class="fill-current w-4 h-4 mr-2" viewBox="0 0 533.5 544.3" xmlns="http://www.w3.org/2000/svg">
                        <path d="M533.5 278.4c0-18.5-1.5-37.1-4.7-55.3H272.1v104.8h147c-6.1 33.8-25.7 63.7-54.4 82.7v68h87.7c51.5-47.4 81.1-117.4 81.1-200.2z" fill="#4285f4"/>
                        <path d="M272.1 544.3c73.4 0 135.3-24.1 180.4-65.7l-87.7-68c-24.4 16.6-55.9 26-92.6 26-71 0-131.2-47.9-152.8-112.3H28.9v70.1c46.2 91.9 140.3 149.9 243.2 149.9z" fill="#34a853"/>
                        <path d="M119.3 324.3c-11.4-33.8-11.4-70.4 0-104.2V150H28.9c-38.6 76.9-38.6 167.5 0 244.4l90.4-70.1z" fill="#fbbc04"/>
                        <path d="M272.1 107.7c38.8-.6 76.3 14 104.4 40.8l77.7-77.7C405 24.6 339.7-.8 272.1 0 169.2 0 75.1 58 28.9 150l90.4 70.1c21.5-64.5 81.8-112.4 152.8-112.4z" fill="#ea4335"/>
                    </svg>
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
