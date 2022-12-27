<x-app-layout>
    <div class="w-full py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="overflow-hidden shadow-sm rounded">
                <div class="w-full bg-white p-6 shadow-sm rounded">
                    <div class="flex justify-end">
                        <button 
                        id="dropdownButton" 
                        data-dropdown-toggle="dropdown" 
                        class="inline-block text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" 
                        type="button">
                            <span class="sr-only">Open dropdown</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 985.6px, 0px);">
                            <ul class="py-1" aria-labelledby="dropdownButton">
                                <li>
                                    <a href="#" class="flex items-center text-sm font-medium block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 inline mr-1">
                                            <path d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z"/>
                                        </svg> Edit
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex text-red-500 hover:text-red-600 items-center text-sm font-medium w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 inline mr-1">
                                            <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd"/>
                                        </svg> Remove
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex flex-col items-center pb-10">
                        <img class="mb-3 w-28 h-28 rounded-full" src="{{ $user->avatar }}">
                        <h5 class="mb-1 text-xl font-semibold text-gray-900 dark:text-white">
                            {{ $user->name }}
                        </h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $user->username }}
                        </span>
                        <div class="flex mt-4 space-x-3 md:mt-6">
                            <a href="#" class="inline-flex items-center px-4 py-2.5 bg-gray-800 border border-transparent rounded font-bold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Add friend
                            </a>
                            <!--- <a href="#" class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-white rounded-md border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Message</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-transparent overflow-hidden">
                @auth
                <div class="bg-white overflow-hidden shadow-sm rounded mb-8">
                    <div class="p-6 bg-white">
                        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="relative">
                                <x-label for="title" :value="__('Title')"/>
                                <input id="title" type="text" name="title" value="{{ old('title') }}" placeholder="Title"
                                    class="mt-2 mb-1.5 bg-gray-100 transition-all text-sm font-medium w-full py-2 px-2 border-2 outline-2 outline-blue-600 rounded shadow-sm border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50 @error('title') border-2 bg-red-50 focus:border-red-400 focus:ring focus:ring-red-400 focus:ring-opacity-50 border-red-500 @enderror"/>
                                <div class="text-red-500 text-xs h-3 mb-1">
                                    @error('title')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="relative mt-3">
                                <x-label for="picture" :value="__('Picture')"/>
                                <input type="file" id="picture" name="picture" accept="image/png, image/jpeg" class="mt-2 bg-gray-100 transition-all text-sm font-medium w-full border-2 outline-2 outline-blue-600 rounded shadow-sm border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50 @error('body') border-2 bg-red-50 focus:border-red-400 focus:ring focus:ring-red-400 focus:ring-opacity-50 border-red-500 @enderror" aria-describedby="file_input_help">
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                                <div class="text-red-500 text-xs h-3 mb-1">
                                    @error('picture')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="relative mt-3">
                                <x-label for="body" :value="__('Body')"/>
                                <textarea name="body" id="body" cols="30" rows="4" placeholder="Post something!"
                                        class="mt-2 bg-gray-100 transition-all text-sm font-medium w-full py-2 px-2 border-2 outline-2 outline-blue-600 rounded shadow-sm border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50 @error('body') border-2 bg-red-50 focus:border-red-400 focus:ring focus:ring-red-400 focus:ring-opacity-50 border-red-500 @enderror">{{ old('body') }}</textarea>
                                <div class="text-red-500 text-xs h-3 mb-1">
                                    @error('body')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-5">
                                <x-button>
                                    {{ __('Publish post') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
                @endauth
                @if($posts->count())
                    @foreach($posts as $post)
                        <div class="mb-8">
                            <x-post :post="$post"></x-post>
                        </div>
                    @endforeach
                    <div class="">
                        {{ $posts->links() }}
                    </div>
                @else
                    <div class="w-full bg-white px-6 shadow-sm rounded text-gray-700 p-6 opacity-90 text-sm font-medium">
                        {{ $user->username }} does not have any posts
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
