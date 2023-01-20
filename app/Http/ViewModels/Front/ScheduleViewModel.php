<?php

namespace App\Http\ViewModels\Front;

use App\Http\ViewModels\Front\Data\ScheduleBlock;
use App\Http\ViewModels\Front\Data\ScheduleDay;
use App\Http\ViewModels\ViewModel;
use App\Models\Event;
use App\Models\Session;
use App\Models\Track;
use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;

class ScheduleViewModel extends ViewModel
{
    /** @var Collection<Track> */
    public Collection $tracks;

    /** @var Collection<ScheduleDay> */
    public Collection $days;

    public CarbonImmutable $starts_at;

    public CarbonImmutable $ends_at;

    public bool $is_single_day_event;

    public function __construct(
        public Event $event,
    ) {
        $this->tracks = $event->tracks
            ->sortBy(fn (Track $track) => $track->name)
            ->values();

        $this->days = $this->tracks
            ->flatMap(fn (Track $track) => $track->sessions)
            ->groupBy(fn (Session $session) => $session->starts_at->format('d/m/Y'))
            ->map(fn (Collection $sessions) => new ScheduleDay(
                date: $sessions[0]->starts_at,
                blocks: $sessions
                    ->groupBy(fn (Session $session) => $session->starts_at->format('H:i'))
                    ->map(fn (Collection $sessions) => new ScheduleBlock(
                        time: $sessions[0]->starts_at,
                        sessions: $sessions,
                    )),
            ));

        $this->starts_at = $this->tracks
            ->flatMap(fn (Track $track) => $track->sessions)
            ->min(fn (Session $session) => $session->starts_at);

        $this->ends_at = $this->tracks
            ->flatMap(fn (Track $track) => $track->sessions)
            ->max(fn (Session $session) => $session->ends_at);

        $this->is_single_day_event = $this->starts_at->isSameDay($this->ends_at);
    }
}
