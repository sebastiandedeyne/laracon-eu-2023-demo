<?php

namespace App\Http\ViewModels\Inertia;

use App\Http\Resources\EventResource;
use App\Http\Resources\OptionResource;
use App\Models\Event;
use App\Models\Venue;
use Illuminate\Support\Collection;

class EventViewModel extends InertiaViewModel
{
    public string $method;

    public string $action;

    public ?EventResource $event;

    /** @var OptionResource[] $venues */
    public array $venues;

    /** @param Collection<Venue> $venues */
    public function __construct(?Event $event, Collection $venues)
    {
        if ($event) {
            $this->method = 'PUT';
            $this->action = $event->links->update;
        } else {
            $this->method = 'POST';
            $this->action = Event::links()->store;
        }

        $this->event = $event ? EventResource::fromModel($event) : null;

        $this->venues = $venues
            ->map(fn (Venue $venue) => new OptionResource($venue->id, $venue->name))
            ->toArray();
    }
}
