<?php

namespace App\Http\ViewModels\Front\Data;

use App\Models\Session;
use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;

class ScheduleBlock
{
    /** @param Collection<Session> $sessions */
    public function __construct(
        public CarbonImmutable $time,
        public Collection $sessions,
    ) {
    }
}
