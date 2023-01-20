<x-layout.app>
    <x-forms.form
        :action="$venue ? action([App\Http\Controllers\Admin\VenueController::class, 'update'], $venue) : action([App\Http\Controllers\Admin\VenueController::class, 'store'])"
        :method="$venue ? 'PUT' : 'POST'"
    >
        <x-forms.text-field
            name="name"
            label="Name"
            :value="$venue?->name"
        />
        <x-forms.select-field
            name="country_id"
            label="Country"
            :value="$venue?->country_id"
            :options="$countries"
        />
        <x-forms.submit>
            Save
        </x-forms.submit>
    </x-forms.form>
</x-layout.app>
