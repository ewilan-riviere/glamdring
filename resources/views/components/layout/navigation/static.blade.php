@php
$items = [
    [
        'label' => 'Dashboard',
        'icon' => 'dashboard',
        'route' => 'dashboard.index',
    ],
    [
        'label' => 'Notes',
        'icon' => 'notes',
        'route' => 'dashboard.notes',
    ],
    [
        'label' => 'Submissions',
        'icon' => 'submissions',
        'route' => 'dashboard.submissions',
    ],
];
@endphp

<div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-grow flex-col overflow-y-auto bg-indigo-700 pt-5">
        <div class="flex flex-shrink-0 items-center px-4">
            <img class="h-8 w-auto"
                src="https://tailwindui.com/img/logos/workflow-logo-indigo-300-mark-white-text.svg"
                alt="Workflow">
        </div>
        <div class="mt-5 flex flex-1 flex-col">
            <nav class="flex-1 space-y-1 px-2 pb-4">
                <!-- Current: "bg-indigo-800 text-white", Default: "text-indigo-100 hover:bg-indigo-600" -->
                @foreach ($items as $item)
                    <a href="{{ route($item['route']) }}"
                        class="group flex items-center rounded-md px-2 py-2 text-sm font-medium text-indigo-100 hover:bg-indigo-600">
                        <!-- Heroicon name: outline/home -->
                        <svg class="mr-3 h-6 w-6 flex-shrink-0 text-indigo-300"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>
        </div>
    </div>
</div>
