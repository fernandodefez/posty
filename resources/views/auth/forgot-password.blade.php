<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-3 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <div class="h-5 mb-4 mt-1">
            <!-- Session Status -->
            <x-auth-session-status :status="session('status')" />
            <!-- Validation Errors -->
            <x-auth-validation-errors :errors="$errors" />
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <input id="email" class="mt-1 bg-gray-100 transition-all text-sm font-medium w-full py-2 px-2 border-2 outline-2 outline-blue-600 rounded shadow-sm border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50 @error('name') border-2 bg-red-50 focus:border-red-400 focus:ring focus:ring-red-400 focus:ring-opacity-50 border-red-500 @enderror" type="email" name="email" value="{{ old('email') }}" autofocus />
                <div class="text-red-500 text-xs font-normal h-4 mt-1">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
