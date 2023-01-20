@php
    /** @var \App\View\Components\Layout\App $component */
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <x-layout.header
        :title="$component->title ?? ''"
        :items="[
                    ['Events', '#'],
                ]"
    />
    <main class="wrap">
        {{ $slot }}
    </main>
</div>
<div class="fixed bottom-0 left-0 right-0 p-2 bg-purple-600 text-white text-sm flex justify-between">
    <div>
        Queries: {{ request()->attributes->get('queries') }}
    </div>
    <div>
        Admin (<a href="#">switch to editor</a>)
    </div>
</div>
</body>
</html>
