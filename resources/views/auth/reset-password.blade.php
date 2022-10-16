<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
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

                <input id="email" class="mt-1 bg-gray-100 transition-all text-sm font-medium w-full py-2 px-2 border-2 outline-2 outline-blue-600 rounded shadow-sm border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50 @error('email') border-2 bg-red-50 focus:border-red-400 focus:ring focus:ring-red-400 focus:ring-opacity-50 border-red-500 @enderror" type="email" name="email" value="{{ old('email', $request->email) }}" autofocus />
                <div class="text-red-500 text-xs font-normal h-4 mt-1">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <!-- Password -->
            <div class="mt-3">
                <x-label for="password" :value="__('Password')" />

                <input id="password" class="mt-1 bg-gray-100 transition-all text-sm font-medium w-full py-2 px-2 border-2 outline-2 outline-blue-600 rounded shadow-sm border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50 @error('password') border-2 bg-red-50 focus:border-red-400 focus:ring focus:ring-red-400 focus:ring-opacity-50 border-red-500 @enderror" type="password" name="password" />
                <div class="text-red-500 text-xs font-normal h-4 mt-1">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mt-3">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <input id="password_confirmation" class="mt-1 bg-gray-100 transition-all text-sm font-medium w-full py-2 px-2 border-2 outline-2 outline-blue-600 rounded shadow-sm border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50 @error('password_confirmation') border-2 bg-red-50 focus:border-red-400 focus:ring focus:ring-red-400 focus:ring-opacity-50 border-red-500 @enderror" type="password" name="password_confirmation" />
                <div class="text-red-500 text-xs font-normal h-4 mt-1">
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
