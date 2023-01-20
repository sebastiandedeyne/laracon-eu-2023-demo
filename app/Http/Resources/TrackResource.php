<?php

namespace App\Http\Resources;

use App\Models\Track;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class TrackResource extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        #[DataCollectionOf(SessionResource::class)]
        public DataCollection $sessions,
    ) {
    }

    public static function fromTrack(Track $track): self
    {
        return new self(
            id: $track->id,
            name: $track->name,
            sessions: SessionResource::collection($track->sessions),
        );
    }
}
