@php
    /** @var App\View\Components\Forms\Form $component  */
@endphp

<form action="{{ $component->action }}" method="POST">
    @csrf
    @method($component->method)

    <div class="space-y-6">
        {{ $slot }}
    </div>
</form>
