<?php

namespace App\Http\Resources;

use App\Models\Country;
use Spatie\LaravelData\Data;

class CountryResource extends Data
{
    public function __construct(
        public int $id,
        public string $name,
    ) {
    }

    public static function fromCountry(Country $country): self
    {
        return new self(
            id: $country->id,
            name: $country->name,
        );
    }
}
