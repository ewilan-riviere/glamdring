<div class="relative">
    <x-button color="secondary"
        full
        class="flex items-center"
        wire:click="sync">
        <div wire:loading
            wire:target="sync"
            class="absolute top-1/2 left-3 -translate-y-1/2">
            <x-icon-loading />
        </div>
        <x-icon-git-sync class="mr-1 h-5 w-5" />
        <div>Sync. {{ $forge_user->forge_type?->value }}</div>
    </x-button>
</div>
