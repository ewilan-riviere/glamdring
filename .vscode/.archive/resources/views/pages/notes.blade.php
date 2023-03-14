<x-layout.dashboard>
    <div class="container h-[800vh]">
        <livewire:editor />
    </div>
    <div class="pb-10">
        <x-media src="https://ewilan-riviere.com/images/ewilan-riviere.webp"
            class="h-24 w-24" />
        <x-media src="https://ewilan-riviere.com/images/ewilan-riviere"
            class="h-12 w-12" />
        <x-media src="https://www.youtube.com/embed/TRt1rZ1h6YE"
            iframe
            class="h-64 w-96" />
    </div>

    <x-slot:right>
        <x-dashboard.activity />
    </x-slot:right>
</x-layout.dashboard>
