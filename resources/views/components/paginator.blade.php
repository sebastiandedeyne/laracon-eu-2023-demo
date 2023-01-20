@php
    /** @var \App\View\Components\Paginator $component */
@endphp

@if($component->paginator->hasPages())
    <div class="flex justify-center gap-2 mt-4">
        @if($component->paginator->previousPageUrl())
            <a href="{{ $component->paginator->previousPageUrl() }}">←</a>
        @else
            <span class="text-gray-400">←</span>
        @endif
        @if($component->paginator->nextPageUrl())
            <a href="{{ $component->paginator->nextPageUrl() }}">→</a>
        @else
            <span class="text-gray-400">→</span>
        @endif
    </div>
@endif
