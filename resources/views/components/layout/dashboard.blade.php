<x-app>
    <div class="fixed top-0 right-0 h-full w-1/2"
        aria-hidden="true"></div>
    <x-layout.navigation.sidebar />
    <div class="relative flex min-h-screen flex-col">
        <x-layout.navigation.navbar />
        <div class="mx-auto w-full max-w-7xl flex-grow lg:flex xl:px-8">
            <div class="min-w-0 flex-1 xl:flex">
                <div
                    class="xl:w-64 xl:flex-shrink-0 xl:border-r xl:border-gray-200 dark:xl:border-gray-700">
                    <x-dashboard.profile />
                </div>
                <div class="lg:min-w-0 lg:flex-1">
                    {{ $slot }}
                </div>
            </div>
            <div
                class="pr-4 sm:pr-6 lg:flex-shrink-0 lg:border-l lg:border-gray-200 lg:pr-8 dark:lg:border-gray-700 xl:pr-0">
                {{ $right }}
            </div>
        </div>
        <x-layout.footer />
    </div>
</x-app>
