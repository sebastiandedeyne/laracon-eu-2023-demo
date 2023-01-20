<?php

namespace App\View\Components;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Paginator extends Component
{
    public function __construct(
        public LengthAwarePaginator $paginator,
    )
    {
    }

    public function render(): View
    {
        return view('components.paginator', ['component' => $this]);
    }
}
