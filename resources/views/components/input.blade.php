<div class="form-group">
    <label for="{{ $field }}">{{ $text }}</label>
    <input
        type="{{ $type }}"
        name="{{ $field }}" id="{{ $field }}"
        class="form-control @error($field) is-invalid @enderror"
        value="{{ old($field) ?? $current }}"
    >
    @error($field)
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>