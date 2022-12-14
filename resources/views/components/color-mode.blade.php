@php
$small = $attributes->has('small');
@endphp

<button x-data="colorMode"
    {{ $attributes->merge([
        'class' => $small ? 'p-2' : '',
    ]) }}
    :title="`Current mode: ${mode}`"
    @click="switchMode()">
    <div class="flex items-center space-x-1 dark:hidden">
        <svg xmlns="http://www.w3.org/2000/svg"
            class="block h-4 w-4"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round"
                stroke-linejoin="round"
                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
        </svg>
        @if (!$small)
            <div>Toggle dark mode</div>
        @endif
    </div>
    <div class="hidden items-center space-x-1 dark:flex">
        <svg xmlns="http://www.w3.org/2000/svg"
            class="block h-4 w-4"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
        @if (!$small)
            <div>Toggle light mode</div>
        @endif
    </div>
</button>
