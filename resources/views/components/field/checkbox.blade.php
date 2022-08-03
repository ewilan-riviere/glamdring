<div class="flex items-center">
    <input id="{{ $name }}"
        name="{{ $name }}"
        type="checkbox"
        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-700"
        {{ $checked ? 'checked' : '' }}>
    @if ($label)
        <label for="{{ $name }}"
            class="text-gray-dark ml-2 block text-sm">
            {{ $label }}
        </label>
    @endif
</div>
