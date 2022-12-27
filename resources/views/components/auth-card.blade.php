<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-neutral-900">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 mb-8 px-6 py-4 bg-white dark:bg-neutral-800 shadow-sm overflow-hidden rounded">
        {{ $slot }}
    </div>
</div>
