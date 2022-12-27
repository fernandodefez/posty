@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-neutral-700 mb-1 dark:text-gray-100']) }}>
    {{ $value ?? $slot }}
</label>
