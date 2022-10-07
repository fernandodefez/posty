<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between py-4 items-center m-0">
            <h2 class="font-bold text-xl text-gray-800 leading-tight py-2">
                {{ __('Post') }}
            </h2>
            @auth
                <a href="{{ route('posts.create') }}"
                   class="hover:bg-blue-400 group flex m-0 items-center rounded-md bg-blue-500 text-white text-sm font-medium pl-2 pr-3 py-2 shadow-sm"
                   title="Create a new post">
                    <svg width="20" height="20" fill="currentColor" class="mr-1" aria-hidden="true">
                        <path d="M10 5a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H6a1 1 0 1 1 0-2h3V6a1 1 0 0 1 1-1Z" />
                    </svg>
                    <span class="m-0">New</span>
                </a>
            @endauth
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 bg-white border-b border-gray-200">
                    <x-post :post="$post"></x-post>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

