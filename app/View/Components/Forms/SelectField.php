<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class SelectField extends Component
{
    public function __construct(
        public array $options,
        public ?string $name = '',
        public ?string $value = '',
        public ?string $label = '',
    ) {
    }

    public function render()
    {
        return view('components.forms.select-field', ['component' => $this]);
    }
}
