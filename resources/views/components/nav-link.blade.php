@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block text-sm p-2 hover:bg-gray-100 text-blue-700 hover:text-blue-700 rounded md:bg-transparent transition duration-150 ease-in-out md:p-0 dark:text-white'
            : 'block hover:bg-gray-100 p-2 text-sm md:hover:bg-transparent md:p-0 md:hover:text-blue-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
