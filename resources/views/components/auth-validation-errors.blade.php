@props(['errors'])

<div class="font-medium text-red-600">
    @if ($errors->any())
        {{ __('Whoops! Something went wrong.') }}
    @endif
</div>
