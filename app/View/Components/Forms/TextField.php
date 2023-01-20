<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class TextField extends Component
{
    public function __construct(
        public ?string $name = '',
        public ?string $value = '',
        public ?string $label = '',
    ) {
    }

    public function render()
    {
        return view('components.forms.text-field', ['component' => $this]);
    }
}
