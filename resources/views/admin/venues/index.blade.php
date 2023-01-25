<x-layout.app>
    <div class="flex justify-end mb-4">
        <a href="{{ action([App\Http\Controllers\Admin\VenueController::class, 'create']) }}">
            New Venue
        </a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th class="numeric">Last Updated</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($venues as $venue)
                <tr>
                    <td>{{ $venue->name }}</td>
                    <td class="numeric">{{ $venue->updated_at->format('d/m/Y H:i') }}</td>
                    <td><a href="{{ action([App\Http\Controllers\Admin\VenueController::class, 'edit'], $venue) }}">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout.app>
