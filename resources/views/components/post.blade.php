@php use Illuminate\Support\Facades\Auth; @endphp
@props(['post' => $post])
<div class="p-6 bg-white dark:bg-neutral-800 shadow-sm rounded">
    <div class="flex w-full justify-between items-start space-x-1">
        <div class="w-10/12 sm:w-11/12 p-0 m-0 flex mb-4">
            <div class="inline mr-2">
                <a href="{{ route('users.index', $post->user->username) }}"
                   class="text-sm outline-none">
                   <!-- hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 -->
                    <img class="hover:opacity-75 w-9 h-9 rounded-full sm:mb-0 inline" src="{{ $post->user->avatar }}" alt="{{ $post->user->username }}" loading="lazy"/>
                </a>
            </div>
            <div class="grid grid-cols-1 grid-rows-2">
                <a href="{{ route('users.index', $post->user->username) }}"
                   class="row mb-0.5 font-bold p-0 text-sm text-neutral-700 hover:text-purple-800 dark:text-neutral-300 dark:hover:text-white outline-none">
                    {{ $post->user->username }}
                </a>
                <span class="row text-neutral-900 dark:text-neutral-100 text-xs block">{{ $post->created_at->diffForHumans() }}</span>
            </div>
        </div>
        @auth()
            @if(Auth::user()->can('update', $post) && Auth::user()->can('delete', $post))
                <div class="w-2/12 sm:w-1/12 p-0 m-0">
                    <div class="flex items-center m-0 justify-end space-x-2">
                        <button id="dropdownMenuIconHorizontalButton{{$post->id}}" data-dropdown-toggle="dropdownDotsHorizontal{{$post->id}}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-600 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownDotsHorizontal{{$post->id}}" class="hidden z-10 w-28 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-600 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton{{$post->id}}">
                                <li>
                                    <a href="{{ route('posts.edit', $post) }}" class="flex items-center text-sm font-medium py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 inline mr-1">
                                            <path d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z"/>
                                        </svg> Edit
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('posts.destroy', $post) }}" method="post" class="p-0 m-0 block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this post')) this.closest('form').submit();" class="flex text-red-500 hover:text-red-600 items-center text-sm font-medium w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 inline mr-1">
                                                <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd"/>
                                            </svg>
                                            Remove
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        @endauth
    </div>
    @if($post->picture)
    <a class="w-full" href="{{ route('posts.show', $post) }}">
        <img class="w-full hover:opacity-90 h-80 mb-4"
             src="@if(filter_var($post->picture, FILTER_VALIDATE_URL)){{ $post->picture }}@else{{ url('storage/posts/'.$post->picture) }}@endif" alt="{{ $post->user->usernmae . '-' . $post->title . '-image' }}" loading="lazy">
    </a>
    @endif
    <a href="{{ route('posts.show', $post) }}" class="text-sm text-neutral-700 hover:text-purple-800 dark:text-neutral-300 dark:hover:text-white dark:hover:text-neutral-300 font-bold"> {{ $post->title }} </a>
    @if(strlen($post->body) >= 100 && request()->routeIs('home'))
        <p class="text-sm mb-1 mt-3 text-neutral-600 dark:text-neutral-400 font-semibold">
            {{ Str::limit($post->body, 300, '...')}} <a href="{{ route('posts.show', $post) }}" class="mb-6 text-xs font-semibold
                text-purple-700 hover:text-purple-800
                dark:text-purple-400 dark:hover:text-purple-500 outline-none">
                {{ __('Read more') }}
            </a>
        </p>
    @else
        <p class="my-3 text-sm text-neutral-700 dark:text-neutral-300 font-semibold"> {{ $post->body }} </p>
    @endif
    <div class="flex mt-2 flex-col">
        @auth
            @can('like', $post)
                <form action="{{ route('posts.likes.store', $post) }}" method="post" class="flex align-middle mb-2">
                    @csrf
                    <button type="submit" class="p-0 m-0 flex justify-start">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6 p-0 m-0">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                        </svg>
                    </button>
                </form>
            @else
                <form action="{{ route('posts.likes.destroy', $post) }}" method="post" class="flex align-middle mb-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="p-0 m-0 flex justify-start text-pink-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6 p-0 m-0 ">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                        </svg>
                    </button>
                </form>
            @endcan
        @endauth
        <div class="flex items-center justify-start text-neutral-700 hover:text-purple-800 dark:text-neutral-300 dark:hover:text-white dark:hover:text-neutral-300 space-x-2 mt-2">
            <a href="{{ route('posts.likes.index', $post) }}" class="flex space-x-1 items-center">
                <span class="text-xs font-medium">
                    {{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count() ) }}
                </span>
            </a>
        </div>
    </div>
</div>
