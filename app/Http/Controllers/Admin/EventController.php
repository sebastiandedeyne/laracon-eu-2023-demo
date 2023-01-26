<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\Venue;
use Illuminate\Http\Request;

class EventController
{
    public function index()
    {
        return view('admin.events.index', [
            'events' => Event::with('venue.country')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.events.edit', [
            'venues' => Venue::all()
                ->mapWithKeys(fn (Venue $venue) => [$venue->id => $venue->name]),
        ]);
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', [
            'event' => $event,
            'venues' => Venue::all()
                ->mapWithKeys(fn (Venue $venue) => [$venue->id => $venue->name]),
        ]);
    }

    //

    public function store(EventRequest $request)
    {
        $event = Event::create([
            'name' => $request->name,
            'venue_id' => $request->venue_id,
        ]);

        // Update tracks & sessions…

        return redirect($event->links->edit);
    }

    public function update(Event $event, EventRequest $request)
    {
        $event->update([
            'name' => $request->name,
            'venue_id' => $request->venue_id,
        ]);

        // Update tracks & sessions…

        return redirect($event->links->edit);
    }
}
