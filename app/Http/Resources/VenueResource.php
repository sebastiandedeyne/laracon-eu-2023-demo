<?php

namespace App\Http\Resources;

use App\Models\Venue;
use Spatie\LaravelData\Data;

class VenueResource extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public CountryResource $country,
    ) {
    }

    public static function fromVenue(Venue $venue): self
    {
        return new self(
            id: $venue->id,
            name: $venue->name,
            country: CountryResource::fromCountry($venue->country),
        );
    }
}
