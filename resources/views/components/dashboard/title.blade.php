@php
$title = $attributes?->get('title');
@endphp

<div
    class="sticky top-0 z-10 border-b border-t border-gray-200 bg-white pl-4 pr-6 pt-4 pb-4 dark:border-gray-700 dark:bg-gray-900 sm:pl-6 lg:pl-8 xl:border-t-0 xl:pl-6 xl:pt-6">
    <div class="flex items-center">
        <h1 class="flex-1 text-lg font-medium">
            {{ $title }}
        </h1>
        <div class="relative">
            <x-app.dropdown>
                <x-slot name="trigger">
                    <x-app.dropdown-button />
                </x-slot>
                <x-slot name="content">
                    <a href="#"
                        class="text-light block px-4 py-2 text-sm"
                        role="menuitem"
                        tabindex="-1"
                        id="sort-menu-item-0">Name</a>
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
                </x-slot>
            </x-app.dropdown>
        </div>
    </div>
</div>
