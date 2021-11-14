@props([
    'leadingAddOn' => false,
])

<div class="flex">
    @if ($leadingAddOn)
        <span class="inline-flex items-center px-3 bg-gray-50 text-gray-500 sm:text-sm">
            {{ $leadingAddOn }}
        </span>
    @endif

    <input type="date" {{ $attributes->merge(['class' => 'h-9 p-2 border flex-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5' . ($leadingAddOn ? '' : '')]) }} autocomplete="off"/>
</div>
