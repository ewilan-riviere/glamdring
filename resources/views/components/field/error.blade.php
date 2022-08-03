@if ($name)
    <div class="invalid-error-message">
        <p x-show.transition.in="fields.{{ $name }}.errorMessage"
            x-text="fields.{{ $name }}.errorMessage"></p>
        @error($name)
            {{ $message }}
        @enderror
    </div>
@endif
