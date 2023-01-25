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
</body>
</html>
