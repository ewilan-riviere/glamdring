<x-dashboard.title title="Submissions" />
<x-dashboard.entities-list>
    @foreach ($submissions as $submission)
        <li>
            {{-- <x-app.dialog>
                <x-slot:trigger>
                    dialog
                </x-slot:trigger>
                Content
            </x-app.dialog> --}}
            <x-app.slide-over :title="$submission->name">
                <x-slot:trigger>
                    <div
                        class="block cursor-pointer transition-colors duration-100 hover:bg-gray-50 dark:hover:bg-gray-800">
                        <div class="flex items-center px-4 py-4 sm:px-6">
                            <div class="flex min-w-0 flex-1 items-center">
                                <div
                                    class="min-w-0 flex-1 md:grid md:grid-cols-2 md:gap-4">
                                    <div>
                                        <p
                                            class="truncate text-sm font-medium text-indigo-600 dark:text-indigo-400">
                                            {{ $submission->name }}
                                        </p>
                                        <p
                                            class="text-gray-medium mt-2 flex items-center text-sm">
                                            <!-- Heroicon name: solid/mail -->
                                            <svg class="text-gray-medium mr-1.5 h-5 w-5 flex-shrink-0"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                                aria-hidden="true">
                                                <path
                                                    d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                <path
                                                    d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                            </svg>
                                            <span class="truncate">
                                                {{ $submission->email }}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="hidden md:block">
                                        <div>
                                            <p class="text-gray-dark text-sm">
                                                Received at
                                                <time
                                                    datetime="{{ $submission->created_at }}">
                                                    {{ format_date($submission->created_at) }}
                                                </time>
                                            </p>
                                            <p
                                                class="text-gray-medium mt-2 flex items-center text-sm">
                                                {{ $submission->app }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <!-- Heroicon name: solid/chevron-right -->
                                <svg class="h-5 w-5 text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </x-slot:trigger>
                <div class="flex h-full flex-col overflow-y-scroll">
                    <!-- Main -->
                    <div class="divide-y divide-gray-200 dark:divide-gray-700">
                        <div class="pb-6">
                            <div class="flow-root sm:flex sm:items-end">
                                <div class="mt-6 sm:flex-1">
                                    <div>
                                        <div class="flex items-center">
                                            <h3
                                                class="text-gray-dark text-xl font-bold sm:text-2xl">
                                                {{ $submission->name }}
                                            </h3>
                                        </div>
                                        <p class="text-gray-medium text-sm">
                                            {{ $submission->email }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-5 sm:px-0 sm:py-0">
                            <dl
                                class="space-y-8 dark:divide-gray-700 sm:space-y-0 sm:divide-y sm:divide-gray-200">
                                <div class="sm:py-5">
                                    <dt
                                        class="text-gray-medium text-sm font-medium sm:w-40 sm:flex-shrink-0 lg:w-48">
                                        Application
                                    </dt>
                                    <dd
                                        class="text-gray-dark mt-2 text-sm sm:mt-0">
                                        {{ $submission->app }}
                                    </dd>
                                </div>
                                <div class="sm:py-5">
                                    <dt
                                        class="text-gray-medium text-sm font-medium sm:w-40 sm:flex-shrink-0 lg:w-48">
                                        From
                                    </dt>
                                    <dd
                                        class="text-gray-dark mt-2 text-sm sm:mt-0">
                                        <a href="{{ $submission->url }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="block">
                                            {{ $submission->url }}
                                        </a>
                                        <div>{{ $submission->ip }}</div>
                                    </dd>
                                </div>
                                @if ($submission->to)
                                    <div class="sm:py-5">
                                        <dt
                                            class="text-gray-medium text-sm font-medium sm:w-40 sm:flex-shrink-0 lg:w-48">
                                            Recipient
                                        </dt>
                                        <dd
                                            class="text-gray-dark mt-2 text-sm sm:mt-0">
                                            {{ $submission->to }}
                                        </dd>
                                    </div>
                                @endif
                                <div class="sm:py-5">
                                    <dt
                                        class="text-gray-medium text-sm font-medium sm:w-40 sm:flex-shrink-0 lg:w-48">
                                        Message
                                    </dt>
                                    <dd
                                        class="text-gray-dark mt-2 text-sm sm:mt-0">
                                        {{ $submission->message }}
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </x-app.slide-over>
        </li>
    @endforeach
</x-dashboard.entities-list>
