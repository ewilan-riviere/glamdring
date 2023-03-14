@php
$option_class = 'text-light block w-full rounded-md px-4 py-2 text-left text-sm transition-colors hover:bg-gray-50 dark:hover:bg-gray-700';
@endphp

<div class="flex items-center space-x-2">
    <button x-data="{ reverse: false }"
        class="rounded-md px-1.5 py-1.5 text-black dark:text-gray-400 dark:hover:bg-gray-800"
        onclick="window.livewire.emit('projectsSortReverse')"
        @click="reverse = !reverse">
        <x-icon-arrow-sm-up :class="reverse ? 'rotate-180' : ''"
            class="h-6 w-6 transition-transform" />
    </button>
    <div class="relative">
        <x-dropdown>
            <x-slot name="trigger">
                <button type="button"
                    class="text-light inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 dark:ring-offset-gray-900 dark:hover:bg-gray-800"
                    id="sort-menu-button"
                    aria-expanded="false"
                    aria-haspopup="true">
                    <!-- Heroicon name: solid/sort-ascending -->
                    <svg class="mr-3 h-5 w-5 text-gray-400"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true">
                        <path
                            d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                    </svg>
                    Sort
                    <!-- Heroicon name: solid/chevron-down -->
                    <svg class="ml-2.5 -mr-1.5 h-5 w-5 text-gray-400"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </x-slot>
            <x-slot name="content">
                <div class="m-1.5">
                    <button class="{{ $option_class }}"
                        role="menuitem"
                        tabindex="-1"
                        id="sort-menu-item-0"
                        onclick="window.livewire.emit('projectsSort', 'title')">
                        By title
                    </button>
                </div>
            </x-slot>
        </x-dropdown>
    </div>
</div>
