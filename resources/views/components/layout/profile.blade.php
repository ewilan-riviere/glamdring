<x-dropdown>
    <x-slot name="trigger">
        <button
            class="flex rounded-full border-2 border-transparent text-sm text-white transition-colors hover:border-gray-200 focus:border-gray-200 focus:outline-none">
            <span class="sr-only">Open user menu</span>
            <img class="h-8 w-8 rounded-full"
                src="{{ $forge_user->avatar_url }}"
                alt="{{ $forge_user->name }}" />
        </button>
    </x-slot>
    <x-slot name="content">
        <div>
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <a href="#"
                class="text-gray-dark block px-4 py-2 text-sm"
                role="menuitem"
                tabindex="-1"
                id="user-menu-item-0">Your Profile</a>

            <a href="#"
                class="text-gray-dark block px-4 py-2 text-sm"
                role="menuitem"
                tabindex="-1"
                id="user-menu-item-1">Settings</a>

            <form method="POST"
                action="{{ route('logout') }}"
                x-data
                role="menuitem"
                tabindex="-1"
                class="block">
                @csrf

                <a href="{{ route('logout') }}"
                    class="text-gray-dark block w-full px-4 py-2 text-sm"
                    @click.prevent="$root.submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>
    </x-slot>
</x-dropdown>
