@php
    /** @var App\Http\ViewModels\Front\ScheduleViewModel $view */
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Demo</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100">
        <div class="wrap pt-8">
            <header class="text-center">
                <h1 class="text-2xl font-bold">
                    {{ $view->event->name }}
                </h1>
                <p class="mt-2">
                    {{ $view->event->venue->name }},
                    {{ $view->event->venue->country->name }}
                </p>
                @if($view->is_single_day_event)
                    <p class="mt-1">
                        {{ $view->starts_at->format('d/m/Y') }}
                    </p>
                @else
                    <p class="mt-1">
                        {{ $view->starts_at->format('d/m/Y') }}–{{ $view->ends_at->format('d/m/Y') }}
                    </p>
                @endif
            </header>
            <table class="bg-white mt-12">
                <thead>
                <tr>
                    <th></th>
                    @foreach($view->tracks as $track)
                        <th>{{ $track->name }}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($view->days as $day)
                    @if(! $view->is_single_day_event)
                        <tr class="bg-gray-200">
                            <td class="font-bold" colspan="{{ $view->tracks->count() + 1 }}">
                                {{ $day->date->format('d/m/Y') }}
                            </td>
                        </tr>
                    @endif
                    @foreach($day->blocks as $block)
                        <tr>
                            <td>{{ $block->time->format('H:i') }}</td>
                            @foreach($block->sessions as $session)
                                <td>{{ $session->name }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
