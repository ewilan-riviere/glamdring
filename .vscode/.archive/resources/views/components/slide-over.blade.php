@php
$id = Str::random();
@endphp

<div id="{{ $id }}"
    x-data="slideOver"
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
            <div class="relative z-50"
                aria-labelledby="slide-over-title"
                role="dialog"
                aria-modal="true">

                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity duration-300 dark:bg-gray-700 dark:bg-opacity-75"
                    x-show="isOpened"
                    x-transition:enter="ease-in-out"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in-out"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"></div>

                <div x-show="isOpened"
                    class="fixed inset-0 overflow-hidden">
                    <div class="absolute inset-0 overflow-hidden">
                        <div
                            class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                            <div @click.outside="toggle"
                                x-show="isOpened"
                                x-transition:enter="transform transition"
                                x-transition:enter-start="translate-x-full"
                                x-transition:enter-end="translate-x-0"
                                x-transition:leave="transform transition"
                                x-transition:leave-start="translate-x-0"
                                x-transition:leave-end="translate-x-full"
                                class="pointer-events-auto w-screen max-w-md duration-200 ease-in-out sm:duration-300">
                                <div
                                    class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl dark:bg-gray-800">
                                    <div class="px-4 sm:px-6">
                                        <div
                                            class="flex items-start justify-between">
                                            @isset($title)
                                                <h2 class="text-gray-dark text-lg font-medium"
                                                    id="slide-over-title">
                                                    {{ $title }}
                                                </h2>
                                            @else
                                                <div></div>
                                            @endisset
                                            <div
                                                class="ml-3 flex h-7 items-center">
                                                <button type="button"
                                                    class="text-gray-medium rounded-md bg-white hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:bg-gray-900"
                                                    @click="open = false">
                                                    <span class="sr-only">Close
                                                        panel</span>
                                                    <!-- Heroicon name: outline/x -->
                                                    <svg class="h-6 w-6"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="2"
                                                        stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="relative mt-6 flex-1 px-4 sm:px-6">
                                        {{ $slot }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
