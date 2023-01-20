<?php

namespace App\Http\Controllers\Admin;

use App\Http\ViewModels\Admin\IndexViewModel;
use App\Http\ViewModels\Admin\VenueViewModel;
use App\Models\Country;
use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController
{
    public function index()
    {
        return view('admin.venues.index', new IndexViewModel(
            paginator: Venue::with('country')->paginate(),
            links: Venue::links(),
        ));
    }

    public function create()
    {
        return view('admin.venues.edit', new VenueViewModel(
            venue: null,
            countries: Country::all(),
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'country_id' => ['required', 'exists:countries,id'],
        ]);

        $venue = Venue::create($data);

        return redirect($venue->links->edit);
    }

    public function edit(Venue $venue)
    {
        return view('admin.venues.edit', new VenueViewModel(
            venue: $venue,
            countries: Country::all(),
        ));
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
