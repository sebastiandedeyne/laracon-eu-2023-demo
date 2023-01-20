<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Submit extends Component
{
    public function render()
    {
        return view('components.forms.submit', ['component' => $this]);
    }
}
