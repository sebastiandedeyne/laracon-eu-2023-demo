<?php

namespace App\Http\Resources;

use App\Models\Event;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class EventResource extends Data
{
    public function __construct(
        public string $name,
        public int $venue_id,
        #[DataCollectionOf(TrackResource::class)]
        public DataCollection $tracks,
    ) {
    }

    public static function fromModel(Event $event): self
    {
        return new self(
            name: $event->name,
            venue_id: $event->venue_id,
            tracks: TrackResource::collection($event->tracks),
        );
    }
}
