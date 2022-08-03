@push('styles')
    <style>
        .ProseMirror-focused {
            outline: none;
        }
    </style>
@endpush

<div class="tiptap">
    <div x-data="tiptap"
        wire:ignore
        {{ $attributes->whereDoesntStartWith('wire:model') }}>
        <div class="flex items-center space-x-1">
            <template x-for="(action,index) in actions"
                :key="index">
                <button @click="command(action)"
                    :class="{ 'border-white': isActive(action) }"'"
                    class="tiptap-action relative border border-transparent">
                    <span x-html="action.icon ? action.icon : action.title"
                        :title="`${action.title} (${action.hotkey})`"
                        class="block h-4 w-4"></span>
                </button>
            </template>
        </div>

        <div x-ref="editorReference"
            class="prose prose-p:m-0 dark:prose-invert mt-1 rounded-lg border border-gray-300 py-1 px-2 focus:border-transparent focus:outline-none focus:ring-2 focus:ring-gray-600">
        </div>
        <div x-text="countWords"></div>
    </div>
</div>
