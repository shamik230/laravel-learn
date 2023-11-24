@props([
    'label',
    'name',
    'items',
    'defaultValue' => 0
])


<div>
    <label>{{ $label }}:</label>
    <select name="{{ $name }}">
        <option value="{{ $errors->any() ? old($name) : $defaultValue }}" selected> {{ $errors->any() ? $items[old($name)] : $items[$defaultValue] }}</option>
        @foreach ($items as $key => $value)
            @if(($errors->any() ? old($name) : $defaultValue) != $key)
                <option value="{{ $key }}">{{ $value }}</option>
            @endif
        @endforeach
    </select>
    @error($name)
        <div style="color: red">{{ $message }}</div>
    @enderror
</div>

