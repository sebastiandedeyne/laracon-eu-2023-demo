<?php

namespace App\Http\Requests;

use App\Http\Resources\TrackResource;
use App\Models\Venue;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class EventRequest extends Data
{
    public function __construct(
        public string $name,
        #[Exists(Venue::class)]
        public int $venue_id,
        #[DataCollectionOf(TrackResource::class)]
        public DataCollection $tracks,
    ) {
    }
}
