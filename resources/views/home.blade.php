<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold py-6 text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-600 p-6 opacity-90 text-sm font-medium">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
