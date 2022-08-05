<form wire:submit.prevent="save">
    <x-field.text name="title"
        label="Title"
        wire:model="title"
        required />
    <div class="mt-2">
        <x-button type="submit">
            Save
        </x-button>
    </div>
</form>
