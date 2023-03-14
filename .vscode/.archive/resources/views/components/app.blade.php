<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
        content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token"
        content="{{ csrf_token() }}">

    <title>
        {{ config('app.name') }}
    </title>

    <link rel="icon"
        type="image/svg+xml"
        href="/icon.svg">
    {{-- <link rel="apple-touch-icon"
        sizes="180x180"
        href="/apple-touch-icon.png">
    <link rel="icon"
        type="image/png"
        sizes="32x32"
        href="/favicon-32x32.png">
    <link rel="icon"
        type="image/png"
        sizes="16x16"
        href="/favicon-16x16.png"> --}}
    <link rel="manifest"
        href="/site.webmanifest">

    <script src="{{ asset('/js/color-mode.js') }}"></script>

    @vite(['resources/css/app.css', 'resources/ts/app.ts'])
    @stack('styles')
    @livewireStyles
</head>

<body
    class="{{ config('app.env') === 'local' ? 'debug-screens' : '' }} color-mode">
    {{ $slot }}

    @stack('modals')
    @stack('scripts')
    {{-- <livewire:dialog /> --}}
    @livewireScripts
</body>

</html>
