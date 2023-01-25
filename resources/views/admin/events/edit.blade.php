@php
    /** @var \App\Http\ViewModels\Admin\EventEditViewModel $view */
@endphp

<x-layout.app :title="$view->event?->name ?? 'New'">
    <x-forms.form :action="$view->action" :method="$view->method">
        <x-forms.text-field
            name="name"
            label="Name"
            :value="$view->event?->name"
        />
        <x-forms.select-field
            name="venue_id"
            label="Venue"
            :value="$view->event?->venue_id"
            :options="$view->venues"
        />
        <x-forms.submit>
            Save
        </x-forms.submit>
    </x-forms.form>
</x-layout.app>
