<div class="form-group">
    <label for="{{ $field }}">{{ $text }}</label>
    @if($type == "textarea")
        <textarea
            name="{{ $field }}" id="{{ $field }}"
            class="form-control @error($field) is-invalid @enderror"
        >{{ old($field) ?? $current }}</textarea>
    @else
    <input
        type="{{ $type }}"
        name="{{ $field }}" id="{{ $field }}"
        class="form-control @error($field) is-invalid @enderror"
        value="{{ old($field) ?? $current }}"
    >
    @endif

    @error($field)
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>