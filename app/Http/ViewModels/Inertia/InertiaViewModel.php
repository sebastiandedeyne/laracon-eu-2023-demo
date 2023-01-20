<?php

namespace App\Http\ViewModels\Inertia;

use Spatie\LaravelData\Data;

abstract class InertiaViewModel extends Data
{
    public function toArray(): array
    {
        return ['view' => parent::toArray()];
    }
}
