@if ($link)
    <a target="{{ $external ? '_blank' : '' }}"
        rel="{{ $external ? 'noopener noreferrer' : '' }}"
        {{ $attributes->merge(['class' => $class]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}"
        {{ $attributes->merge(['class' => $class]) }}>
        {{ $slot }}
    </button>
@endif
