@php
$title = $attributes?->get('title');
@endphp

<div
    class="sticky top-0 z-10 border-b border-t border-gray-200 bg-white pl-4 pr-6 pt-4 pb-4 dark:border-gray-700 dark:bg-gray-900 sm:pl-6 lg:pl-8 xl:border-t-0 xl:pl-6 xl:pt-6">
    <div class="flex items-center">
        <h1 class="flex-1 text-lg font-medium">
            {{ $title }}
        </h1>
        <livewire:filter.sorter />
    </div>
</div>
