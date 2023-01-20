<?php

namespace App\Http\ViewModels\Front\Data;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;

class ScheduleDay
{
    /** @param Collection<ScheduleBlock> $blocks */
    public function __construct(
        public CarbonImmutable $date,
        public Collection $blocks,
    ) {
    }
}
