<?php

namespace App\Http\Controllers\Inertia;

use App\Http\ViewModels\Inertia\EventEditViewModel;
use App\Models\Event;
use App\Models\Venue;

class EventController
{
    public function create()
    {
        return inertia('Events/Edit', new EventEditViewModel(
            event: null,
            venues: Venue::all(),
        ));
    }

    public function edit(Event $event)
    {
        return inertia('Events/Edit', new EventViewModel(
            event: $event,
            venues: Venue::all(),
        ));
    }

    public function update(Event $event)
    {
        //

        return redirect($event->links->edit);
    }
}
