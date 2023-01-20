<?php

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class App extends Component
{
    public function __construct(
        public string $title = '',
    ) {
    }

    public function render()
    {
        return view('components.layout.app', ['component' => $this]);
    }
}
