{{-- <div>
    <label for="{{ $name }}"
        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
        @if ($label)
            {{ $label }}
            @if ($required)
                <span class="text-red-600">*</span>
            @endif
        @endif
    </label>
    <div class="mt-1">
        @if ($multiline)
            <textarea id="{{ $name }}"
                name="{{ $name }}"
                type="{{ $type }}"
                autocomplete="{{ $name }}"
                required="{{ $required }}"
                placeholder="{{ $placeholder }}"
                value="{{ $value }}"
                x-model.lazy="form.{{ $name }}"
                cols="30"
                rows="10"
                {{ $attributes->merge(['class' => 'appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600']) }}></textarea>
        @else
            <input id="{{ $name }}"
                name="{{ $name }}"
                type="{{ $type }}"
                autocomplete="{{ $name }}"
                required="{{ $required }}"
                placeholder="{{ $placeholder }}"
                value="{{ $value }}"
                x-model.lazy="form.{{ $name }}"
                {{ $attributes->merge(['class' => 'appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600']) }} />
        @endif
    </div>
    <x-field.error :name="$name" />
</div> --}}

<input id="{{ $name }}"
    name="{{ $name }}"
    type="{{ $type }}"
    autocomplete="{{ $name }}"
    required="{{ $required }}"
    placeholder="{{ $placeholder }}"
    value="{{ $value }}" />
