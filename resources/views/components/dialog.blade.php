@php
$id = Str::random();
@endphp

<div id="{{ $id }}"
    x-data="dialog"
    x-init="boot('{{ $id }}')"
    x-cloak>
    <div @click="toggle">
        @isset($trigger)
            {{ $trigger }}
        @else
            default trigger
        @endisset
    </div>
    <div id="{{ $id }}-wrapper">
        <div x-show="isOpened"
            id="{{ $id }}-content"
            class="{{ $id }}-dialog relative z-50"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true">
            <div x-show="isOpened"
                x-transition:enter="ease-in-out"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in-out"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-40 bg-gray-500 bg-opacity-75 transition-opacity">
            </div>
            <div class="fixed inset-0 z-50 overflow-y-auto">
                <div
                    class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div x-show="isOpened"
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-10"
                        x-transition:leave="ease-out duration-300"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-10"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all dark:bg-gray-800 sm:my-8 sm:w-full sm:max-w-sm sm:p-6"
                        @click.outside="toggle">
                        <div>
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
