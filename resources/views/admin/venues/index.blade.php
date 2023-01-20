@php
    /** @var \App\Http\ViewModels\Admin\IndexViewModel<\App\Models\Venue> $view */
@endphp

<x-layout.app>
    <div class="flex justify-end mb-4">
        <a href="{{ $view->links->create }}">
            New Venue
        </a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Country</th>
                <th class="numeric">Last Updated</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($view->items as $venue)
            <tr>
                <td>{{ $venue->name }}</td>
                <td>{{ $venue->country->name }}</td>
                <td class="numeric">{{ $venue->updated_at->format('d/m/Y H:i') }}</td>
                <td><a href="{{ $venue->links->edit }}">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <x-paginator :paginator="$view->paginator" />
</x-layout.app>
