<x-app-layout>
    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
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
            <div class="w-full flex justify-end">
                <div class="grid grid-cols-1">
                    <form action="{{ route('home') }}" method="get" role="search"
                          class="flex items-center justify-between mb-8">
                        <div class="relative">
                            <input name="search" id="search" placeholder="Search for posts"
                                   class="transition-all text-sm font-medium w-full shadow-sm bg-white py-2 px-2 border-2 outline-2 outline-blue-600 rounded shadow-sm border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50"
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
