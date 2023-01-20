<?php

namespace App\View\Components\Layout;

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\VenueController;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Header extends Component
{
    /** @param array{0: string, 1: string, 2: bool}[] $items */
    public array $items;

    public string $section;

    public function __construct(
        public string $title,
    ) {
        $this->items = Arr::map(
            [
                ['Events', action([EventController::class, 'index'])],
                ['Venues', action([VenueController::class, 'index'])],
            ],
            fn (array $item) => [...$item, $this->isActive($item[1])],
        );

        $this->section = Arr::first($this->items, fn (array $item) => $item[2])[0] ?? '';
    }

    private function isActive($url): bool
    {
        return Str::startsWith(request()->url(), $url);
    }

    public function render()
    {
        return view('components.layout.header', ['component' => $this]);
    }
}
