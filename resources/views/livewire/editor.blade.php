<div class="relative m-2">
    <button type="button"
        wire:click="togglePreview"
        class="relative z-20">
        preview
    </button>
    <div class="relative">
        <div @class([
            'transition-opacity relative z-10',
            'opacity-0' => $preview,
            'opacity-100' => !$preview,
        ])>
            <x-field.editor wire:model="content" />
        </div>
        <div @class([
            'transition-opacity absolute inset-0',
            'opacity-100' => $preview,
            'opacity-0' => !$preview,
        ])>
            {!! $content !!}
        </div>
    </div>
</div>
