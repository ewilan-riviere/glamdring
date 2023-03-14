<div>
    <div
        class="flex items-center justify-between text-sm font-medium text-gray-700 dark:text-gray-300">
        <label for="{{ $name }}"
            class="block">
            @if ($label)
                {{ $label }}
                @if ($required)
                    <span class="text-red-600">*</span>
                @endif
            @endif
        </label>
        <div class="italic">
            <x-field.error :name="$name" />
        </div>
    </div>
    <div class="mt-1">
        @if ($multiline)
            <textarea id="{{ $name }}"
                name="{{ $name }}"
                type="{{ $type }}"
                autocomplete="{{ $name }}"
                required="{{ $required }}"
                placeholder="{{ $placeholder }}"
                value="{{ $value }}"
                cols="30"
                rows="10"
                {{ $attributes->merge(['class' => $textarea_class]) }}></textarea>
        @else
            <input id="{{ $name }}"
                name="{{ $name }}"
                type="{{ $type }}"
                autocomplete="{{ $name }}"
                required="{{ $required }}"
                placeholder="{{ $placeholder }}"
                value="{{ $value }}"
                {{ $attributes->merge(['class' => $text_class]) }} />
        @endif
    </div>
</div>
