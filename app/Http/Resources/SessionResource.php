<?php

namespace App\Http\Resources;

use App\Models\Session;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;

class SessionResource extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public CarbonImmutable $starts_at,
        public CarbonImmutable $ends_at,
    ) {
    }

    public function fromSession(Session $session): self
    {
        return new self(
            id: $session->id,
            name: $session->name,
            starts_at: $session->starts_at,
            ends_at: $session->ends_at,
        );
    }
}
