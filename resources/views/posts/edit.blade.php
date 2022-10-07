<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between py-4 items-center m-0">
            <h2 class="font-bold text-xl text-gray-800 leading-tight py-2">
                {{ __('Edit Post') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="p-0 mb-3">
                        Post
                    </p>
                    @auth
                        <form action="{{ route('posts.update', $post) }}" method="POST" class="mb-5">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="body" class="sr-only">
                                    Body
                                </label>
                                <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100  border outline-0 transition-all focus:border-2 focus:border-blue-500 w-full p-4 rounded-lg @error('body') border-2 border-red-500 @enderror" placeholder="Post something!">{{ $post->body }}</textarea>
                                @error('body')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded font-semibold">
                                    Edit
                                </button>
                            </div>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
