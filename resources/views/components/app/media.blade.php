@php
$class = $attributes?->get('class');
@endphp

<div id="{{ $id }}"
    x-data="media"
    x-init="boot('{{ $id }}')"
    class="lazy-media relative my-2">

    <div @class([
        'lazy-media-transition bg-gray-50 dark:bg-gray-800 absolute inset-0 opacity-100 transition-opacity duration-200',
        $class,
    ])
        style="{{ $color !== '#ffffff' ? `background-color: ${color};` : '' }}">
        @if ($iframe)
            <span
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                Media is loading...
            </span>
        @endif
    </div>

    @if ($iframe)
        <iframe width="{{ $width }}"
            height="{{ $height }}"
            data-src="{{ $src }}"
            title="{{ $alt }}"
            @class(['lazy-media-media', $class, $preflight_class => $preflight])
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
            loading="lazy"></iframe>
    @else
        <img @class(['lazy-media-media', $class, $preflight_class => $preflight])
            data-src="{{ $src }}"
            title="{{ $alt }}"
            alt="{{ $alt }}"
            loading="lazy" />
    @endif
</div>
