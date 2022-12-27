@props(['errors'])

<div class="font-medium text-red-500 dark:text-red-400">
    @if ($errors->any())
        {{ __('Whoops! Something went wrong.') }}
    @endif
</div>
