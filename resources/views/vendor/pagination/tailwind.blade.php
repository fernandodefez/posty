@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between pb-6">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium
                text-gray-400 dark:text-neutral-600
                rounded
                bg-white dark:bg-neutral-800
                border border-gray-300 dark:border dark:border-neutral-700
                cursor-default
                leading-5">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium rounded
                 text-purple-100 hover:text-white
                 dark:text-neutral-800

                 bg-purple-700 hover:bg-purple-800
                 dark:bg-purple-400 dark:hover:bg-purple-500

                 border border-purple-700 hover:border-purple-800
                 dark:border dark:border-purple-400 dark:hover:border-purple-500

                 hover:ring-4 ring-purple-800 ring-opacity-30 hover:border-purple-800 hover:bg-purple-800 hover:text-white
                 dark:hover:ring-4 dark:ring-purple-400 dark:ring-opacity-30 dark:hover:border-purple-500 dark:hover:bg-purple-500

                 focus:outline-none
                 focus:ring-4 ring-purple-800 ring-opacity-30 focus:border-purple-800 focus:bg-purple-800 focus:text-white
                 dark:focus:outline-none
                 dark:focus:ring-4 dark:ring-purple-400 dark:ring-opacity-30 dark:focus:border-purple-500 dark:focus:bg-purple-500

                 transition ease-in-out duration-150">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium rounded
                 text-purple-100 hover:text-white
                 dark:text-neutral-800

                 bg-purple-700 hover:bg-purple-800
                 dark:bg-purple-400 dark:hover:bg-purple-500

                 border border-purple-700 hover:border-purple-800
                 dark:border dark:border-purple-400 dark:hover:border-purple-500

                 hover:ring-4 ring-purple-800 ring-opacity-30 hover:border-purple-800 hover:bg-purple-800 hover:text-white
                 dark:hover:ring-4 dark:ring-purple-400 dark:ring-opacity-30 dark:hover:border-purple-500 dark:hover:bg-purple-500

                 focus:outline-none
                 focus:ring-4 ring-purple-800 ring-opacity-30 focus:border-purple-800 focus:bg-purple-800 focus:text-white
                 dark:focus:outline-none
                 dark:focus:ring-4 dark:ring-purple-400 dark:ring-opacity-30 dark:focus:border-purple-500 dark:focus:bg-purple-500

                 transition ease-in-out duration-150">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium
                text-gray-400 dark:text-neutral-600
                rounded
                bg-white dark:bg-neutral-800
                border border-gray-300 dark:border dark:border-neutral-700
                cursor-default
                leading-5">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-medium text-neutral-500 dark:text-neutral-400 leading-5">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-bold text-neutral-900 dark:text-white">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-bold text-neutral-900 dark:text-white">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-bold text-neutral-900 dark:text-white">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex rounded">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white dark:text-neutral-700 dark:bg-neutral-800 border border-gray-300 dark:border-neutral-700 cursor-default rounded-l  transition ease-in-out duration-150 leading-5" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white dark:text-purple-200 dark:hover:text-white dark:bg-neutral-800 border border-gray-300 dark:border-neutral-700 rounded-l transition ease-in-out duration-150 leading-5" aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium bg-purple-700 text-white dark:bg-purple-400 dark:text-neutral border border-gray-300 dark:border-neutral-700 cursor-default leading-5">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 bg-white dark:bg-neutral-800
                                    border border-gray-300
                                    text-gray-500 dark:text-purple-200
                                    hover:bg-gray-100
                                    focus:ring-2 ring-purple-500 ring-opacity-50 focus:border-purple-700
                                    dark:border-neutral-700 hover:text-neutral-800 dark:hover:text-white focus:z-10 focus:outline-none dark:focus:ring-2 dark:ring-purple-500 dark:ring-opacity-50 dark:focus:border-purple-400
                                    dark:active:bg-purple-400 dark:active:text-white
                                    transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white hover:bg-gray-100 dark:bg-neutral-800 dark:text-purple-200 border border-gray-300 dark:border-neutral-700 rounded-r leading-5 hover:text-neutral-800 dark:hover:text-white focus:z-10 focus:outline-none focus:ring-2 ring-purple-500 ring-opacity-50 focus:border-purple-700
                        dark:focus:ring-2 dark:ring-purple-500 dark:ring-opacity-50 dark:focus:border-purple-400
                        active:bg-gray-100 active:text-neutral-800
                        dark:active:bg-purple-400 dark:active:text-neutral-900 transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white dark:bg-neutral-800 dark:text-neutral-700 border border-gray-300 dark:border-neutral-700 rounded-r leading-5 focus:z-10 focus:outline-none focus:ring-2 ring-purple-500 ring-opacity-50 focus:border-purple-700 transition ease-in-out duration-150 cursor-not-allowed" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
