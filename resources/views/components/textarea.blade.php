@props([
    'label',
    'name',
    'defaultValue' => ''
])


<div>
    {{ $label }}:
    <textarea name="{{ $name }}">{{ $errors->any() ? old($name) : $defaultValue }}</textarea>
    @error($name)
        <div style="color: red">{{ $message }}</div>
    @enderror
</div>