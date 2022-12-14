@php
$git = $forge_user?->forge_type?->name ?? 'git';
$git_icon = "icon-{$git}";
@endphp
<div class="sticky top-0">
    <div class="flex-1 space-y-8 py-6 pr-6 pl-4 sm:pl-6 lg:pl-8 xl:pl-0">
        <div
            class="space-y-8 sm:flex sm:items-center sm:justify-between sm:space-y-0 xl:block xl:space-y-8">
            <!-- Profile -->
            <div class="flex items-center space-x-3">
                <div class="h-12 w-12 flex-shrink-0">
                    <img class="h-12 w-12 rounded-full"
                        src="{{ $forge_user->avatar_url }}"
                        alt="{{ $forge_user->name }}">
                </div>
                <div class="space-y-1">
                    <div class="text-gray-dark text-sm font-medium">
                        {{ $forge_user->name }}
                    </div>
                    <a href="{{ $forge_user->web_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="group flex items-center space-x-1">
                        <x-dynamic-component :component="$git_icon"
                            class="group-hover:text-gray-dark h-5 w-5 text-gray-400" />
                        <span
                            class="text-gray-medium group-hover:text-gray-dark text-sm font-medium">
                            &#64;{{ $forge_user->username }}
                        </span>
                    </a>
                </div>
            </div>
            <!-- Action buttons -->
            <div class="flex-col space-y-2 sm:flex-row xl:flex xl:flex-col">
                <x-dialog>
                    <x-slot:trigger>
                        <x-button full>
                            New Project
                        </x-button>
                    </x-slot:trigger>
                    <livewire:form.project-form />
                </x-dialog>
                <livewire:forge.sync />
                <x-button x-data="submission"
                    x-cloak
                    full
                    @click="send">
                    <div x-show="loading"
                        class="absolute top-1/2 left-3 -translate-y-1/2">
                        <x-icon-loading />
                    </div>
                    Send
                </x-button>
            </div>
        </div>
        <!-- Meta info -->
        <div
            class="flex flex-col space-y-6 sm:flex-row sm:space-y-0 sm:space-x-8 xl:flex-col xl:space-x-0 xl:space-y-4">
            <div class="flex items-center space-x-2">
                <!-- Heroicon name: solid/collection -->
                <svg class="h-5 w-5 text-gray-400"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true">
                    <path
                        d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                </svg>
                <span
                    class="text-sm font-medium text-gray-500 dark:text-gray-400">
                    {{ $projects_count ?? 0 }} Projects
                </span>
            </div>
        </div>
    </div>

</div>
