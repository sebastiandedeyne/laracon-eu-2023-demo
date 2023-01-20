@php
    /** @var \App\Http\ViewModels\Admin\VenueViewModel $view */
@endphp

<x-layout.app>
    <x-forms.form :action="$view->action" :method="$view->method">
        <x-forms.text-field
            name="name"
            label="Name"
            :value="$view->venue?->name"
        />
        <x-forms.select-field
            name="country_id"
            label="Country"
            :value="$view->venue?->country_id"
            :options="$view->countries"
        />
        <x-forms.submit>
            Save
        </x-forms.submit>
    </x-forms.form>
</x-layout.app>
