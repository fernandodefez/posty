@props(['post' => $post])

<div class="py-6">
    <div class="flex justify-start items-center space-x-1">
        <a href="{{ route('users.index', $post->user->username) }}" class="font-bold p-0">{{ $post->user->username  }} </a>
        @can('update', $post)
            <a href="{{ route('posts.edit', $post) }}"
               class="text-blue-500 p-0 text-sm"
               title="Edit post">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 inline">
                    <path d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z" />
                </svg>
            </a>
        @endcan
        @can('delete', $post)
            <form action="{{ route('posts.destroy', $post) }}" method="post" class="p-0 m-0 flex items-center">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 text-sm p-0" title="Delete post">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 inline">
                        <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
        @endcan
    </div>
    <span class="text-slate-400 text-xs block mt-0 mb-2">{{ $post->created_at->diffForHumans() }}</span>
    <p class="mb-2 text-sm text-gray-500 font-semibold">{{ Str::limit($post->body, 350)}}</p>
    <div class="flex flex-col">
        @auth
            @can('like', $post)
                <form action="{{ route('posts.likes.store', $post) }}" method="post" class="flex align-middle">
                    @csrf
                    <button type="submit" class="p-0 m-0 flex justify-start">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 p-0 m-0">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </button>
                </form>
            @else
                <form action="{{ route('posts.likes.destroy', $post) }}" method="post" class="flex align-middle">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="p-0 m-0 flex justify-start text-pink-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 p-0 m-0 ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </button>
                </form>
            @endcan
        @endauth
            <div class="flex items-center justify-start text-slate-700 space-x-2 mt-2">
                <a href="{{ route('posts.likes.index', $post) }}" class="flex space-x-1 items-center">
                    <span class="text-xs font-medium">
                        {{ $likes = $post->likes->count() }} {{ Str::plural('like', $likes) }}
                    </span>
                </a>
            </div>
    </div>
</div>
