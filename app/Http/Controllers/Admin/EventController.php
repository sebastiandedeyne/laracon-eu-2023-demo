<?php

namespace App\Http\Controllers\Admin;

use App\Http\ViewModels\Admin\EventViewModel;
use App\Http\ViewModels\Admin\IndexViewModel;
use App\Models\Event;
use App\Models\Venue;
use Illuminate\Http\Request;

class EventController
{
    public function index()
    {
        return view('admin.events.index', new IndexViewModel(
            paginator: Event::with('venue.country')->paginate(),
            links: Event::links(),
        ));
    }

    public function create()
    {
        return view('admin.events.edit', new EventViewModel(
            event: null,
            venues: Venue::all(),
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'venue_id' => ['required', 'exists:venues,id'],
        ]);

        $event = Event::create($data);

        return redirect($event->links->edit);
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', new EventViewModel(
            event: $event,
            venues: Venue::all(),
        ));
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
