<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Venue;
use Illuminate\Http\Request;

class EventController
{
    public function index()
    {
        return view('admin.events.index', [
            'events' => Event::with('venue.country')->all(),
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

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'venue_id' => ['required', 'exists:venues,id'],
        ]);

        $event = Event::create($data);

        return redirect($event->links->edit);
    }

    public function update(Event $event, Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'venue_id' => ['required', 'exists:venues,id'],
            'tracks.*.name' => ['required'],
        ]);

        $event->update($data);

        return redirect($event->links->edit);
    }
}
