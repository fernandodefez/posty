<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between py-4 items-center m-0">
            <div class="font-bold text-xl text-gray-800 leading-tight py-2">
                🧑 {{ $user->name }}
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if($posts->count())
                    @foreach($posts as $post)
                        <div class="grid grid-cols-1 bg-white px-6 mb-4 rounded-lg divide-y">
                            <x-post :post="$post"></x-post>
                        </div>
                    @endforeach
                    {{ $posts->links() }}
                @else
                    <div class="text-gray-600 p-6 opacity-90 text-sm font-medium">
                        {{ $user->username }} does not have any posts
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
