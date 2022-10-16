<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between py-4 items-center m-0">
            <h2 class="font-bold text-xl text-gray-800 leading-tight py-2">
                {{ __('Posts') }}
            </h2>
            @auth
                <a href="{{ route('posts.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded font-bold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                   title="Create a new post">
                    {{ __('New') }}
                </a>
            @endauth
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex justify-end">
                <div class="grid grid-cols-1">
                    <form action="{{ route('posts.index') }}" method="get" role="search" class="flex items-center justify-between mb-8">
                        <div class="relative">
                            <input name="search" id="search" placeholder="Search for posts" class="transition-all text-sm font-medium w-full shadow-sm bg-white py-2 px-2 border-2 outline-2 outline-blue-600 rounded shadow-sm border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50"
                            @if(request('search')) value="{{ request('search') }}" @endif
                            />
                        </div>
                        <div class="relative ml-2">
                            <x-button>
                                {{ __('Search') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bg-transparent overflow-hidden">
                @if($posts->count())
                    <div class="grid grid-cols-3 gap-6 columns-auto">
                        @foreach($posts as $post)
                            <div class="w-full bg-white px-6 shadow-sm rounded">
                                <x-post :post="$post"></x-post>
                            </div>
                        @endforeach
                    </div>
                    <div class="w-full mt-8">
                        {{ $posts->links() }}
                    </div>
                @else
                    <div class="w-full bg-white px-6 shadow-sm rounded text-gray-700 p-6 opacity-90 text-sm font-medium">
                        @if(request('search'))
                            {{ __('We have not found any posts.') }}
                        @else
                            {{ __('There are any posts yet.') }}
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
