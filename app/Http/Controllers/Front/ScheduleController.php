<?php

namespace App\Http\Controllers\Front;

use App\Http\ViewModels\Front\ScheduleViewModel;
use App\Models\Event;

class ScheduleController
{
    public function __invoke(Event $event)
    {
        return view('front.schedule', new ScheduleViewModel($event));
    }
}
