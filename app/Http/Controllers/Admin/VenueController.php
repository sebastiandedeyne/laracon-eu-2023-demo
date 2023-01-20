<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController
{
    public function index()
    {
        return view('admin.venues.index', [
            'venues' => Venue::paginate(),
        ]);
    }

    public function create()
    {
        return view('admin.venues.edit', [
            'countries' => Country::all()
                ->mapWithKeys(fn (Country $country) => [$country->id => $country->name]),
        ]);
    }

    public function edit(Venue $venue)
    {
        return view('admin.venues.edit', [
            'venue' => $venue,
            'countries' => Country::all()
                ->mapWithKeys(fn (Country $country) => [$country->id => $country->name]),
        ]);
    }

    //

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'country_id' => ['required', 'exists:countries,id'],
        ]);

        $venue = Venue::create($data);

        return redirect($venue->links->edit);
    }

    public function update(Request $request, Venue $venue)
    {
        $data = $request->validate([
            'name' => ['required'],
            'country_id' => ['required', 'exists:countries,id'],
        ]);

        $venue->update($data);

        return redirect($venue->links->edit);
    }
}
