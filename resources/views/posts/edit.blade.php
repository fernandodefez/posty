<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 gap-8 grid grid-cols-1 md:grid-cols-2">
            <div class="bg-transparent mb-8">
                <x-post :post="$post"></x-post>
            </div>
            <div class="overflow-hidden shadow-sm rounded">
                <div class="p-6 bg-white">
                    @auth
                        <form action="{{ route('posts.update', $post) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="relative">
                                <x-label for="title" :value="__('Title')" />
                                <input id="title" type="text" name="title" value="{{ $post->title }}" placeholder="Title"
                                       class="mt-2 mb-1.5 bg-gray-100 transition-all text-sm font-medium w-full py-2 px-2 border-2 outline-2 outline-blue-600 rounded shadow-sm border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50
                                         @error('title') border-2 bg-red-50 focus:border-red-400 focus:ring focus:ring-red-400 focus:ring-opacity-50 border-red-500 @enderror"
                                />
                                <div class="text-red-500 text-xs font-medium h-2">
                                    @error('title')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="relative mt-4">
                                <x-label for="body" :value="__('Body')" />
                                <textarea name="body" id="body" cols="30" rows="8" placeholder="Post something!"
                                          class="mt-2 bg-gray-100 transition-all text-sm font-medium w-full py-2 px-2 border-2 outline-2 outline-blue-600 rounded shadow-sm border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:ring-opacity-50
                                    @error('body') border-2 bg-red-50 focus:border-red-400 focus:ring focus:ring-red-400 focus:ring-opacity-50 border-red-500 @enderror">{{ $post->body }}</textarea>
                                <div class="text-red-500 text-xs font-medium h-2">
                                    @error('body')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-5">
                                <x-button>
                                    {{ __('Edit post') }}
                                </x-button>
                            </div>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
