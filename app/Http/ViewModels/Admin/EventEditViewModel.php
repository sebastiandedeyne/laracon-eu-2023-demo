<?php

namespace App\Http\ViewModels\Admin;

use App\Http\ViewModels\ViewModel;
use App\Models\Event;
use App\Models\Venue;
use Illuminate\Support\Collection;

class EventEditViewModel extends ViewModel
{
    public string $action;

    public string $method;

    /** @param Collection<Venue> $venues */
    public function __construct(
        public ?Event $event,
        public Collection $venues,
    ) {
        $this->action = $this->event ? $this->event->links->update : Event::links()->store;

        $this->method = $this->event ? 'PUT' : 'POST';

        $this->venues = $venues
            ->mapWithKeys(fn (Venue $venue) => [$venue->id => $venue->name]);
    }
}
