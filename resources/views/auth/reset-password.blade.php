<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-neutral-600 dark:text-neutral-200" />
            </a>
        </x-slot>

        <div class="h-6 mb-4 mt-2">
            <!-- Validation Errors -->
            <x-auth-validation-errors :errors="$errors" />
        </div>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
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
                                @enderror" type="email" name="email" value="{{ old('email', $request->email) }}" autofocus placeholder="Enter your email"/>
                <div class="text-red-500 dark:text-red-400 text-xs font-medium h-4 mt-1">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <!-- Password -->
            <div class="mt-3">
                <x-label for="password" :value="__('New Password')" />

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
                                @enderror" type="password" name="password" placeholder="Enter your new password" />
                <div class="text-red-500 dark:text-red-400 text-xs font-medium h-4 mt-1">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mt-3">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <input id="password_confirmation" class="
                                block w-full font-medium rounded transition-all ease-in-out
                                mt-2 mb-1.5
                                font-medium text-sm w-full rounded transition-all ease-in-out
                                text-neutral-900 dark:text-white
                                bg-gray-100 dark:bg-neutral-700
                                placeholder-gray-400 dark:placeholder-neutral-500
                                outline-2 outline-purple-800 dark:outline-2 dark:outline-500
                                focus-visible:outline-0
                                dark:focus-visible:outline-0
                                @error('password_confirmation')
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
                                @enderror" type="password" name="password_confirmation" placeholder="Enter your new password again" />
                <div class="text-red-500 dark:text-red-400 text-xs font-medium h-4 mt-1">
                    @error('password_confirmation')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
