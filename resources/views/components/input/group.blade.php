@props([
    'label',
    'for',
    'error' => false,
    'helpText' => false,
    'inline' => false,
    'paddingless' => false,
    'borderless' => false,
])

@if($inline)
    <div>
        @if ($label)
        <label for="{{ $for }}" class="block text-sm font-medium leading-5 text-gray-700">{{ $label }}</label>
        @endif

        <div class="mt-1 relative">
            {{ $slot }}

            @if ($error)
                <div class="mt-1 text-red-500 text-sm">{{ $error }}</div>
            @endif

            @if ($helpText)
                <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
            @endif
        </div>
    </div>
@else
    <div class="@if ($label) sm:grid sm:grid-cols-3 @endif sm:gap-4 sm:items-start {{ $paddingless ? '' : ' sm:py-5 ' }}">
        @if ($label)
        <label for="{{ $for }}" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            {{ $label }}
        </label>
        @endif

        <div class="sm:col-span-2">
            {{ $slot }}

            @if ($error)
                <div class="mt-1 text-red-500 text-sm">{{ $error }}</div>
            @endif

            @if ($helpText)
                <p class="mt-1 text-xs text-gray-500">{{ $helpText }}</p>
            @endif
        </div>
    </div>
@endif
