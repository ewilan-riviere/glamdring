@php
$class = $attributes?->get('class');
@endphp


<div class="lazy-media relative">
    <div @class([
        'lazy-media-transition bg-gray-50 dark:bg-gray-800 absolute inset-0 opacity-100 transition-opacity duration-200',
        $class,
    ])
        style="{{ $color !== '#ffffff' ? `background-color: ${color};` : '' }}">
    </div>
    <img @class(['lazy-media-img hidden', $class])
        data-src="{{ $src }}"
        alt="{{ $alt }}"
        loading="lazy" />
    <img @class(['lazy-media-placeholder', $class])
        src="{{ $placeholder }}"
        alt="{{ $alt }}"
        loading="lazy" />
</div>
