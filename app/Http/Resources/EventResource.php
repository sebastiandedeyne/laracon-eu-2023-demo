<?php

namespace App\Http\Resources;

use App\Models\Event;
use App\Support\Links;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class EventResource extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public VenueResource $venue,
        #[DataCollectionOf(TrackResource::class)]
        public DataCollection $tracks,
        public Links $links,
    ) {
    }

    public static function fromEvent(Event $event): self
    {
        return new self(
            id: $event->id,
            name: $event->name,
            venue: VenueResource::fromVenue($event->venue),
            tracks: TrackResource::collection($event->tracks),
            links: $event->links,
        );
    }
}
