<?php

namespace App\Http\ViewModels\Inertia;

use App\Http\Resources\EventResource;
use App\Http\Resources\OptionResource;
use App\Models\Event;
use Illuminate\Support\Collection;
use Spatie\LaravelData\DataCollection;

class EventEditViewModel extends InertiaViewModel
{
    public ?EventResource $event;

    public DataCollection $venues;

    public function __construct(
        ?Event $event,
        Collection $venues,
    )
    {
        $this->event = $event ? EventResource::fromEvent($event) : null;

        $this->venues = OptionResource::collection($venues);
    }
}
