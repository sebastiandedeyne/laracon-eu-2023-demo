@php
    /** @var App\View\Components\Forms\TextField $component */
@endphp

<div>
    <label for="{{ $component->name }}" class="block font-bold uppercase text-sm">
        {{ $component->label }}
    </label>
    <input
        type="text"
        name="{{ $component->name }}"
        id="{{ $component->name }}"
        value="{{ old($name, $component->value) }}"
        class="block w-full border-b mt-1"
    >
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
