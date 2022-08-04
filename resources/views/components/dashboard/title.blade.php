@php
$title = $attributes?->get('title');
@endphp

<div
    class="sticky top-0 z-10 border-b border-t border-gray-200 bg-white pl-4 pr-6 pt-4 pb-4 dark:border-gray-700 dark:bg-gray-900 sm:pl-6 lg:pl-8 xl:border-t-0 xl:pl-6 xl:pt-6">
    <div class="flex items-center">
        <h1 class="flex-1 text-lg font-medium">
            {{ $title }}
        </h1>
        <x-icon-arrow-sm-up class="h-6 w-6 text-black dark:text-gray-400" />
        <div class="relative">
            <x-app.dropdown>
                <x-slot name="trigger">
                    <x-app.dropdown-button />
                </x-slot>
                <x-slot name="content">
                    <div class="m-1.5">
                        <button
                            class="text-light block w-full rounded-md px-4 py-2 text-left text-sm transition-colors hover:bg-gray-50 dark:hover:bg-gray-700"
                            role="menuitem"
                            tabindex="-1"
                            id="sort-menu-item-0"
                            wire:click="byName">
                            By title
                        </button>
                        <a href="#"
                            class="text-light block px-4 py-2 text-sm"
                            role="menuitem"
                            tabindex="-1"
                            id="sort-menu-item-1">Date
                            modified</a>
                        <a href="#"
                            class="text-light block px-4 py-2 text-sm"
                            role="menuitem"
                            tabindex="-1"
                            id="sort-menu-item-2">Date
                            created</a>
                    </div>
                </x-slot>
            </x-app.dropdown>
        </div>
    </div>
</div>
