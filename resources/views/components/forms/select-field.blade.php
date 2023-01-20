@php
    /** @var App\View\Components\Forms\SelectField $component */
@endphp

<div>
    <label for="{{ $component->name }}" class="block font-bold uppercase text-sm">
        {{ $component->label }}
    </label>
    <select
        name="{{ $component->name }}"
        id="{{ $component->name }}"
        class="p-0 block w-full border-b mt-1"
    >
        <option value=""></option>
        @foreach($component->options as $option => $label)
            <option
                value="{{ $option }}"
                @if($option == old($name, $value)) selected @endif
            >
                {{ $label }}
            </option>
        @endforeach
    </select>
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
