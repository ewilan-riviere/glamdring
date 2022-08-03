<nav class="flex-shrink-0 bg-indigo-600">
    <div class="mx-auto max-w-7xl px-2 sm:px-4 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <!-- Logo section -->
            <a href="/"
                class="flex items-center px-2 lg:px-0 xl:w-64">
                <div class="flex-shrink-0">
                    <img class="h-8 w-auto"
                        src="/images/brand-icon-text-white.svg"
                        alt="Workflow">
                </div>
            </a>

            <!-- Search section -->
            <div class="flex flex-1 justify-center lg:justify-end">
                <div class="w-full px-2 lg:px-6">
                    <label for="search"
                        class="sr-only">Search projects</label>
                    <div
                        class="relative text-indigo-200 focus-within:text-gray-400">
                        <div
                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <!-- Heroicon name: solid/search -->
                            <svg class="h-5 w-5"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input id="search"
                            name="search"
                            class="block w-full rounded-md border border-transparent bg-indigo-400 bg-opacity-25 py-2 pl-10 pr-3 leading-5 text-indigo-100 placeholder-indigo-200 focus:bg-white focus:text-gray-900 focus:placeholder-gray-400 focus:outline-none focus:ring-0 sm:text-sm"
                            placeholder="Search projects"
                            type="search">
                    </div>
                </div>
            </div>
            <div class="flex lg:hidden">
                <!-- Mobile menu button -->
                <button type="button"
                    class="inline-flex items-center justify-center rounded-md bg-indigo-600 p-2 text-indigo-400 hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-indigo-600"
                    aria-controls="mobile-menu"
                    aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
      Icon when menu is closed.

      Heroicon name: outline/menu-alt-1

      Menu open: "hidden", Menu closed: "block"
    -->
                    <svg class="block h-6 w-6"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                    <!--
      Icon when menu is open.

      Heroicon name: outline/x

      Menu open: "block", Menu closed: "hidden"
    -->
                    <svg class="hidden h-6 w-6"
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
            <!-- Links section -->
            <div class="hidden lg:block lg:w-80">
                <div class="flex items-center justify-end space-x-2">
                    <div class="flex space-x-2">
                        <x-layout.navigation.item :route="route('dashboard.notes')"
                            label="Notes" />
                        <x-layout.navigation.item :route="route('dashboard.submissions')"
                            label="Submissions" />
                        <x-layout.navigation.item :route="route('filament.pages.dashboard')"
                            label="Admin"
                            external />
                    </div>
                    <x-layout.profile />
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="lg:hidden"
        id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <!-- Current: "text-white bg-indigo-800", Default: "text-indigo-200 hover:text-indigo-100 hover:bg-indigo-600" -->
            <a href="#"
                class="block rounded-md bg-indigo-800 px-3 py-2 text-base font-medium text-white"
                aria-current="page">Dashboard</a>

            <a href="#"
                class="block rounded-md px-3 py-2 text-base font-medium text-indigo-200 hover:bg-indigo-600 hover:text-indigo-100">Domains</a>
        </div>
        <div class="border-t border-indigo-800 pt-4 pb-3">
            <div class="space-y-1 px-2">
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-indigo-200 hover:bg-indigo-600 hover:text-indigo-100">Your
                    Profile</a>

                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-indigo-200 hover:bg-indigo-600 hover:text-indigo-100">Settings</a>

                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-indigo-200 hover:bg-indigo-600 hover:text-indigo-100">Sign
                    out</a>
            </div>
        </div>
    </div>
</nav>
