<div x-data
    x-cloak
    class="relative z-40 md:hidden"
    role="dialog"
    aria-modal="true">
    <div x-show="$store.sidebar"
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>

    <div x-show="$store.sidebar"
        class="fixed inset-0 z-40 flex">

        <div x-show="$store.sidebar"
            x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="relative flex w-full max-w-xs flex-1 flex-col bg-indigo-700 pt-5 pb-4"
            @click.outside="$store.sidebar = false">

            <div x-show="$store.sidebar"
                x-transition:enter="ease-in-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in-out duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute top-0 right-0 -mr-12 pt-2">
                <button type="button"
                    class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    @click="$store.sidebar = false">
                    <span class="sr-only">Close sidebar</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6 text-white"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex flex-shrink-0 items-center px-4">
                <img class="h-8 w-auto"
                    src="https://tailwindui.com/img/logos/workflow-logo-indigo-300-mark-white-text.svg"
                    alt="Workflow">
            </div>
            <div class="mt-5 h-0 flex-1 overflow-y-auto">
                <nav class="space-y-1 px-2">
                    <!-- Current: "bg-indigo-800 text-white", Default: "text-indigo-100 hover:bg-indigo-600" -->
                    <a href="#"
                        class="group flex items-center rounded-md bg-indigo-800 px-2 py-2 text-base font-medium text-white">
                        <!-- Heroicon name: outline/home -->
                        <svg class="mr-4 h-6 w-6 flex-shrink-0 text-indigo-300"
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
                        Dashboard
                    </a>
                </nav>
            </div>
        </div>

        <div class="w-14 flex-shrink-0"
            aria-hidden="true">
            <!-- Dummy element to force sidebar to shrink to fit close icon -->
        </div>
    </div>
</div>
