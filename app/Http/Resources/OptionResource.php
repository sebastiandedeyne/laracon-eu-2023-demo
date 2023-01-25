<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;

class OptionResource extends Data
{
    public function __construct(
        public string|int $value,
        public string $label,
    ) {
    }

    public static function fromModel(Model $model): self
    {
        return new self($model->id, $model->name);
    }
}
