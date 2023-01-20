@php
    /** @var \App\Http\ViewModels\Admin\IndexViewModel<\App\Models\Event> $view */
@endphp

<x-layout.app>
    <div class="flex justify-end mb-4">
        <a href="{{ $view->links->create }}">
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
            @foreach($view->items as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->venue->name }}</td>
                    <td>{{ $event->venue->country->name }}</td>
                    <td class="numeric">{{ $event->updated_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ $event->links->edit }}">Edit</a> <br>
                        <a href="{{ $event->links->show }}">View↗</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <x-paginator :paginator="$view->paginator" />
</x-layout.app>
