<?php

namespace App\Http\Resources;

use Spatie\LaravelData\Data;

class OptionResource extends Data
{
    public function __construct(
        public string|int $value,
        public string $label,
    ) {
    }
}
