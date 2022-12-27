<x-app-layout>
    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @auth
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm rounded mb-8">
                <div class="p-6 bg-white bg-white dark:bg-neutral-800">
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="relative">
                            <x-label for="title" :value="__('Title')"/>
                            <input id="title" type="text" name="title" value="{{ old('title') }}" placeholder="Title"
                                   class="mt-2 mb-1.5 py-2 px-2
                                   font-medium text-sm w-full rounded transition-all ease-in-out
                                   text-neutral-900 dark:text-white
                                   bg-gray-100 dark:bg-neutral-700
                                   placeholder-gray-400 dark:placeholder-neutral-500
                                   outline-2 outline-purple-800 dark:outline-2 dark:outline-500
                                   @error('title')
                                   dark:text-neutral-900
                                   bg-red-50 dark:bg-red-100 dark:bg-opacity-80
                                   border-2 border-red-500 focus:border-red-500
                                   dark:border-2 dark:focus:border-red-400 dark:border-red-400
                                   focus:ring focus:ring-red-500 focus:ring-opacity-25
                                   dark:focus:ring dark:focus:ring-red-400 dark:focus:ring-opacity-25
                                   @else
                                   border-2 border-gray-300 focus:border-purple-800
                                   dark:border-2 dark:border-neutral-600 dark:focus:border-purple-500
                                   focus:ring focus:ring-purple-800 focus:ring-opacity-25
                                   dark:focus:ring dark:focus:ring-purple-500 dark:focus:ring-opacity-25
                                   @enderror"/>
                            <div class="text-red-500 dark:text-red-400 text-xs font-medium h-3 mb-1">
                                @error('title')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="relative mt-3">
                            <x-label for="picture" :value="__('Picture')"/>
                            <input type="file" id="picture" name="picture" accept="image/png, image/jpeg" class="
                                block w-full font-medium rounded transition-all ease-in-out
                                mt-2 mb-1.5
                                font-medium text-sm w-full rounded transition-all ease-in-out
                                text-neutral-900 dark:text-white
                                bg-gray-100 dark:bg-neutral-700
                                placeholder-gray-400 dark:placeholder-neutral-500
                                outline-2 outline-purple-800 dark:outline-2 dark:outline-500
                                focus-visible:outline-0
                                dark:focus-visible:outline-0
                                @error('picture')
                                   dark:text-neutral-900
                                   bg-red-50 dark:bg-red-100 dark:bg-opacity-80
                                   border-2 border-red-500 focus:border-red-500
                                   dark:border-2 dark:focus:border-red-400 dark:border-red-400
                                   focus:ring focus:ring-red-500 focus:ring-opacity-25
                                   dark:focus:ring dark:focus:ring-red-400 dark:focus:ring-opacity-25
                                @else
                                   border-2 border-gray-300 focus:border-purple-800
                                   dark:border-2 dark:border-neutral-600 dark:focus:border-purple-500
                                   focus:ring focus:ring-purple-800 focus:ring-opacity-25
                                   dark:focus:ring dark:focus:ring-purple-500 dark:focus:ring-opacity-25
                                @enderror">
                            <div class="text-red-500 dark:text-red-400 text-xs font-medium h-3 mb-1">
                                @error('picture')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="relative mt-3">
                            <x-label for="body" :value="__('Body')"/>
                            <textarea name="body" id="body" cols="30" rows="4" placeholder="Post something!"
                                      class="mt-2 mb-0 py-2 px-2
                                   font-medium text-sm w-full rounded transition-all ease-in-out
                                   text-neutral-900 dark:text-white
                                   bg-gray-100 dark:bg-neutral-700
                                   placeholder-gray-400 dark:placeholder-neutral-500
                                   outline-2 outline-purple-800 dark:outline-2 dark:outline-500
                                   @error('picture')
                                   dark:text-neutral-900
                                   bg-red-50 dark:bg-red-100 dark:bg-opacity-80
                                   border-2 border-red-500 focus:border-red-500
                                   dark:border-2 dark:focus:border-red-400 dark:border-red-400
                                   focus:ring focus:ring-red-500 focus:ring-opacity-25
                                   dark:focus:ring dark:focus:ring-red-400 dark:focus:ring-opacity-25
                                   @else
                                   border-2 border-gray-300 focus:border-purple-800
                                   dark:border-2 dark:border-neutral-600 dark:focus:border-purple-500
                                   focus:ring focus:ring-purple-800 focus:ring-opacity-25
                                   dark:focus:ring dark:focus:ring-purple-500 dark:focus:ring-opacity-25
                                   @enderror">{{ old('body') }}</textarea>
                            <div class="text-red-500 dark:text-red-400 text-xs font-medium h-3 mb-1">
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
            <div class="w-full flex justify-end">
                <div class="grid grid-cols-1">
                    <form action="{{ route('home') }}" method="get" role="search"
                          class="flex items-center justify-between mb-8">
                        <div class="relative">
                            <input name="search" id="search" placeholder="Search for posts"
                                   class="mt-2 mb-1.5 py-2 px-2
                                   font-medium text-sm w-full rounded transition-all ease-in-out
                                   text-neutral-900 dark:text-white
                                   bg-white dark:bg-neutral-800
                                   placeholder-gray-400 dark:placeholder-neutral-500
                                   outline-2 outline-purple-800 dark:outline-2 dark:outline-500


                                   border-2 border-gray-300 focus:border-purple-800
                                   dark:border-2 dark:border-neutral-700 dark:focus:border-purple-500
                                   focus:ring focus:ring-purple-800 focus:ring-opacity-25
                                   dark:focus:ring dark:focus:ring-purple-500 dark:focus:ring-opacity-25
                                   focus-visible:outline-0 dark:focus-visible:outline-0
                                   "
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
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-transparent">
                    @foreach($posts as $post)
                        <div class="bg-transparent">
                            <x-post :post="$post"></x-post>
                        </div>
                    @endforeach
                </div>
                <div class="w-full mt-8">
                    {{ $posts->links() }}
                </div>
                @else
                <div class="w-full bg-white px-6 shadow-sm rounded text-neutral-800 dark:bg-neutral-800 dark:text-gray-200 p-6 text-sm font-medium">
                    @if(request('search'))
                        {{ __('We have not found any posts that matches your search.') }}
                    @else
                        {{ __('We have not found any posts.') }}
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
