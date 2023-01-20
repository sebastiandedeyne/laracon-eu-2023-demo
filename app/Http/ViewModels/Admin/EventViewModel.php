<?php

namespace App\Http\ViewModels\Admin;

use App\Http\ViewModels\ViewModel;
use App\Models\Event;
use App\Models\Venue;
use Illuminate\Support\Collection;

class EventViewModel extends ViewModel
{
    public string $method;

    public string $action;

    public array $venues;

    /** @param Collection<Venue> $venues */
    public function __construct(
        public ?Event $event,
        Collection $venues,
    ) {
        if ($this->event) {
            $this->method = 'PUT';
            $this->action = $this->event->links->update;
        } else {
            $this->method = 'POST';
            $this->action = Event::links()->store;
        }

        $this->venues = $venues
            ->mapWithKeys(fn (Venue $venue) => [$venue->id => $venue->name])
            ->toArray();
    }
}
