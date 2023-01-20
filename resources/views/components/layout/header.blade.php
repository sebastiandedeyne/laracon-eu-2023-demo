@php
    /** @var \App\View\Components\Layout\Header $component */
@endphp

<div class="bg-gray-100 mb-4">
    <div class="wrap">
        <nav>
            <ul class="flex py-1 gap-4 text-sm border-b">
                @foreach($component->items as [$label, $url, $active])
                    <li>
                        <a href="{{ $url }}" @if($active) aria-current="true" @endif>
                            {{ $label }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <header class="pt-4 pb-8">
            <h1 class="uppercase font-bold text-lg">
                {{ $section }}
                @if($component->title)
                    → {{ $component->title }}
                @endif
            </h1>
            @isset($actions)
                <div>{{ $actions }}</div>
            @endisset
        </header>
    </div>
</div>
