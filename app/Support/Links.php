<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Model;

class Links
{
    public function __construct(
        public ?string $index = null,
        public ?string $create = null,
        public ?string $store = null,
        public ?string $show = null,
        public ?string $edit = null,
        public ?string $update = null,
        public ?string $destroy = null,
    ) {
    }
}
