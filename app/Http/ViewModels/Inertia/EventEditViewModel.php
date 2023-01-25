<?php

namespace App\Http\ViewModels\Inertia;

use App\Http\Resources\EventResource;
use App\Http\Resources\OptionResource;
use App\Http\Resources\VenueResource;
use App\Models\Event;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

class EventEditViewModel extends InertiaViewModel
{
    public ?EventResource $event;

    #[DataCollectionOf(VenueResource::class)]
    public DataCollection $venues;

    public string $action;

    public string $method;

    public function __construct(
        ?Event $event,
        Collection $venues,
    ) {
        $this->event = $event ? EventResource::fromEvent($event) : null;

        $this->venues = OptionResource::collection($venues);

        $this->action = $this->event
            ? $this->event->links->update
            : Event::links()->store;

        $this->method = $this->event ? 'put' : 'post';
    }
}
