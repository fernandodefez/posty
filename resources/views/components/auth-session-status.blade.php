@props(['status'])

<div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
    @if ($status)
        {{ $status }}
    @endif
</div>
