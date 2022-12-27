<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-8">
            <x-post :post="$post"></x-post>
            <div class="overflow-hidden shadow-sm rounded">
                <div class="w-full bg-white dark:bg-neutral-800 py-6 px-6 rounded">
                    <p class="text-sm p-0 font-bold text-neutral-800 text-opacity-90 dark:text-gray-100 mb-3">
                        People who liked this post
                    </p>
                    @if($likes->count())
                        <div class="grid grid-cols-1 divide-y auto-cols-max dark:divide-neutral-700">
                            @foreach($likes as $like)
                                <div class="w-12/12 flex align-middle justify-between py-2">
                                    <div class="flex w-full items-center justify-start space-x-1">
                                        <img class="mr-1.5 hover:opacity-75 w-8 h-8 rounded-full inline" src="{{ $like->user->avatar }}" alt="{{ $like->user->name }}"/>
                                        <a href="{{ route('users.index', $like->user->username) }}"
                                           class="mr-1.5 text-neutral-500 hover:text-neutral-700 dark:text-gray-200 dark:hover:text-white text-sm font-medium">
                                            @auth
                                                @if(Auth()->user()->username === $like->user->username)
                                                    {{ __('you') }}
                                                @else
                                                    {{ $like->user->username }}
                                                @endif
                                            @else
                                                {{ $like->user->username }}
                                            @endauth
                                        </a>
                                        <span class="inline text-gray-600 dark:text-gray-300 text-xs">
                                        {{ _('( '. $like->created_at->diffForHumans(). ' )') }}
                                    </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-5">
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
