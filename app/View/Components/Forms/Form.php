<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Form extends Component
{
    public function __construct(
        public string $action,
        public string $method = 'POST',
    ) {
    }

    public function render()
    {
        return view('components.forms.form', ['component' => $this]);
    }
}
