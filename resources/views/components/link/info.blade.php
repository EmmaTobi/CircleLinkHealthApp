<a
    {{ $attributes->merge([
        'class' => 'border-purple-300 text-purple-700 active:bg-purple-50 active:text-purple-800 hover:text-purple-500' . ($attributes->get('disabled') ? ' opacity-75 cursor-not-allowed' : ''),
    ]) }}
>
    {{ $slot }}
</a>
