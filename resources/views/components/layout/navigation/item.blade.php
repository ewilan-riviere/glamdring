<a href="{{ $route }}"
    target="{{ $external ? '_blank' : '_self' }}"
    rel="{{ $external ? 'noopener noreferrer' : '' }}"
    @class([
        'rounded-md px-2 py-2 text-sm font-medium text-indigo-200 transition-colors duration-100',
        'bg-gray-100 bg-opacity-10 text-white' => $current === $route,
        'hover:bg-gray-100 hover:bg-opacity-10 hover:text-white' =>
            $current !== $route,
    ])>
    {{ $label }}
</a>
