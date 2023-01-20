<x-layout.app>
    <div class="flex justify-end mb-4">
        <a href="{{ action([App\Http\Controllers\Admin\EventController::class, 'create']) }}">
            New Event
        </a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Venue</th>
                <th>Country</th>
                <th class="numeric">Last Updated</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->venue->name }}</td>
                    <td>{{ $event->venue->country->name }}</td>
                    <td class="numeric">{{ $event->updated_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ action([App\Http\Controllers\Admin\EventController::class, 'edit'], $event) }}">Edit</a> <br>
                        <a href="{{ action(App\Http\Controllers\Front\ScheduleController::class, $event) }}">View↗</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <x-paginator :paginator="$events" />
</x-layout.app>
