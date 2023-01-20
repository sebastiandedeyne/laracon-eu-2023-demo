<?php

namespace App\Http\ViewModels\Admin;

use App\Http\ViewModels\ViewModel;
use App\Models\Country;
use App\Models\Venue;
use Illuminate\Support\Collection;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

class VenueViewModel extends ViewModel
{
    public string $method;

    public string $action;

    public array $countries;

    /** @param Collection<Country> $countries */
    public function __construct(
        public ?Venue $venue,
        Collection $countries,
    ) {
        if ($this->venue) {
            $this->method = 'PUT';
            $this->action = $this->venue->links->update;
        } else {
            $this->method = 'POST';
            $this->action = Venue::links()->store;
        }

        $this->countries = $countries
            ->mapWithKeys(fn (Country $country) => [$country->id => $country->name])
            ->toArray();
    }
}
