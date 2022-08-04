<x-app>
    <div class="fixed top-0 right-0 z-40">
        <x-app.color-mode />
    </div>
    <div class="fixed top-0 right-0 h-full w-1/2 bg-gray-50 dark:bg-gray-900"
        aria-hidden="true"></div>
    <div class="relative flex min-h-full flex-col">
        <x-layout.navigation />
        <div
            class="col-span-5 mx-auto grid min-h-screen w-full max-w-7xl grid-cols-5 xl:px-8">
            <div
                class="dark:border-gray-700 xl:border-r xl:border-gray-200 dark:xl:border-gray-800">
                {{ $left }}
            </div>
            <div class="relative z-10 col-span-3">
                {{ $slot }}
            </div>
            <div
                class="pl-6 dark:border-gray-700 dark:bg-gray-900 lg:border-l lg:border-gray-200">
                {{ $right }}
            </div>
        </div>
    </div>
</x-app>
