<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between py-4 items-center m-0">
            <h2 class="font-bold text-xl text-gray-800 leading-tight py-2">
                {{ __("Post's Likes") }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="px-6">
                    <x-post :post="$post"></x-post>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="w-full bg-white p-6 rounded-lg">
                    <p class="text-xl p-0 font-bold text-gray-800 mb-3">
                        Likes
                    </p>
                    @if($likes->count())
                        <div class="grid grid-cols-1 divide-y">
                            @foreach($likes as $like)
                                <div class="w-12/12 flex align-middle justify-between py-2">
                                    <div class="flex w-full items-center justify-start space-x-1">
                                        <a href="{{ route('users.index', $like->user->username) }}"
                                           class="mr-2 text-blue-400 hover:text-blue-500 text-sm font-medium"> {{ $like->user->username }}
                                        </a>
                                        <span class="inline text-slate-400 text-xs">
                                        {{ _('( '. $like->created_at->diffForHumans(). ' )') }}
                                    </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div>
                            {{ $likes->links() }}
                        </div>
                    @else
                        <div class="text-gray-600 opacity-90 text-sm font-medium">
                            This post doesn't have any likes yet.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
